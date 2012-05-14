na.broker = {listing:{}};

na.broker.listing.image = {};
na.broker.listing.image.Uploader = function(container_selector, listing_id) {
	var container = $(container_selector);
	this.management = new na.broker.listing.image.Management(container_selector, listing_id);
	var self = this;
	
	this.show_standard = function() {
		container.find('.uploadify').hide();
		container.find('.standardUploader').show();
	};
	
	this.setup_uploadify = function(file_input_div_id, floor_plan) {
		var script_path = '/broker/listings/' + listing_id + '/upload-single-image/' + floor_plan;
		var button_text = (floor_plan == 1) ? 'Upload Floorplans' : 'Upload Photos';
		
		if($.browser.flash) {
			// Uploadify
	    $('#' + file_input_div_id).uploadify({
	      uploader: '/uploadify.swf',
	      script: script_path,
	      cancelImg: '/images/icons/cancel.png',
	      auto: true,
	      multi: true,
	      fileDataName: 'listing_image',
	      expressInstall: '/expressInstall.swf',
	      queueSizeLimit: 25,
				simUploadLimit: 3,
	      buttonText: button_text,
	      scriptData: UPLOADIFY_SCRIPT_DATA,
	      onComplete: function(event, ID, fileObj, response, data) {
	        json = eval('(' + response + ')');

					if(json.successful) {
						var existing = self.management.existing_images();
						
						self.management.add(json.image);
						
						if(!existing) {
							self.management.primary(json.image.id);
						}
					}										
	      }
	    });

	  } else {
			self.show_standard();
	  }
	
		container.find('.uploadify a').click(function() {
			self.show_standard();
			return false;
		});
	};
	
	// standard uploader
  var options = {
    beforeSubmit:  function() {
      if(container.find('#listing_image_image').val() == "")
        return false;

      container.find('.actions .block').hide();
      container.find('.actions').append(ajax_loader_centered());
    },
    success: function(json) {
      if(json.result == 'success' || json.result == 'partial-success') {
				var existing = self.management.existing_images();
				
				$.each(json.images, function() {
					self.management.add(this);
				});
								
				if(json.images.length > 0 && !existing) {
					self.management.primary(json.images[0].id);
				}
				
        // remove extra browse fields
        container.find('.browseFiles').remove();

        if(json.result  == 'partial-success')
          alert(json.error_count + ' image(s) failed to upload. Please try again.');
      } else {
        alert('Error uploading image(s). Please try again.');
      }
      
      container.find('.actions .block').show();
      container.find('.actions div.center').remove();
    },
    dataType:  'json',
    clearForm: true,
    resetForm: true
  };
  // bind form using 'ajaxForm'
  container.find('form.new_listing_image').ajaxForm(options);
	
	container.find('.uploadImages').click(function() {
    container.find('.new_listing_image').submit();
    return false;
  });
	
	
	this.add_browse_button = function() {
    var html = '<div class="row browseFiles"><span class="floatLeft">';
    html += container.find('.firstBrowseFile').html();
    html += '</span><span class="floatLeft padLeft5">';
    html += '<span class="removeBtn"><a href="#">Remove</a></span>';
    html += '</span><div class="clear"></div></div>';
    container.find('.actions').before(html);
		
    // remove button event
    container.find('.browseFiles a').unbind('click').click(function() {
      $(this).parents('.browseFiles').remove();
      return false;
    });		
	};
	
	container.find('.addImage').click(function() {
    self.add_browse_button();
    return false;
  });
};

na.broker.listing.image.remove = function(id) {
	$.get('/broker/listings/delete_image/' + id);
};

na.broker.listing.image.primary = function(id, listing_id) {
	$.get('/broker/listings/primary_image/' + id, {'listing_id': listing_id});
};

na.broker.listing.image.Management = function(container_selector, listing_id) {
	var container = $(container_selector);
	var id_prefix_selector = '#listing_image_';
	var primary_image_img = $('#primaryListingImage img');
	
	this.add = function(image) {
		var html = '<li id="listing_image_' + image.id + '" data-image-normal="' + image.normal + '" data-id="' + image.id + '">';
    html += '<div><img src="' + image.thumbnail + '" /></div>';
    html += '<a class="makePrimary" href="#">Make primary</a> <br />';
    html += '<a class="delete" href="#">Delete</a>';
    html += '</li>';
    container.find('.imagesManagement ul').append(html);
	};
	
	this.existing_images = function() {
		return ($('.imagesManagement ul li').length > 0);
	};
	
	this.remove = function(image_id) {
		// check to make sure they want it deleted
    if(!confirm("Are you sure you want to delete this image?")) {
      return false;
    }
		
    // check to see if primary image has been deleted...
    if(primary_image_img.attr('src') == $(id_prefix_selector + image_id).attr('data-image-normal')){
      primary_image_img.attr('src', primary_image_img.attr('data-default-src'));
		}
		
    // hide from user
    $(id_prefix_selector + image_id).remove();

		na.broker.listing.image.remove(image_id);
	};
	
	this.primary = function(image_id) {
    var image_normal = $(id_prefix_selector + image_id).attr('data-image-normal');
    primary_image_img.attr('src', image_normal);
		na.broker.listing.image.primary(image_id, listing_id);
	};
	
	var self = this;
	
	container.find('.delete').live('click', function() {
    self.remove($(this).parent().attr('data-id'));
    return false;
  });

  container.find('.makePrimary').live('click', function() {
    self.primary($(this).parent().attr('data-id'));
    return false;
  });
};


/**** Broker: Add / Edit Listing *****/
var EditListing = {
  li_id_prefix: '#listing_image_',
  setup: function() {
    var self = this;
    
		// listing is from a feed, so disable form fields
		if($('#editFeedError').length > 0) {
			$('#listingEdit').find('input,select,textarea').attr('readonly', true).attr('disabled', true);
		}


    $('.shareCraiglist').colorbox({onComplete:function() {
			var currentTheme = 'default';
			
			// change theme and update clipboard copier
			var changeTheme = function(theme) {
				$('#copyCraigslistCode').html($('#cl_theme_' + theme).html());
				init_clipboard_events();
			};
			// choose CL theme
			$('#CL #chooseTheme li').click(function(event) {
				var e = $(this);
				
				if(event.target.nodeName.toLowerCase() != 'input') {
					$(this).find('input').attr('checked', true);
				}
				
				currentTheme = $('input[name=template]:checked').val();
				changeTheme(currentTheme);
				return true;
			});
			
			// set default theme
      changeTheme(currentTheme);
      rollover_button('#cboxLoadedContent .button');
      $('#previewCraigslistAd').click(function() {
        var id = $(this).attr('data-id');
        var url = '/broker/listings/share-craigslist-preview/' + id + '?theme=' + currentTheme;
        window.open(url,'popUpWindow','height=700,width=900,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes');
        return false;
      });
      ga_track_event('Broker: Listings', 'Click', 'share: post to craigslist');
    }});
    
    $('#bs-listings #filters .button, #bs-listings #filtersBottom .button').click(function() {
      $('#a').val($(this).attr('action'));
      $('#updateListings').submit();
      return false;
    });

    $('.featured.upgradePopup, .unfeatured.upgradePopup').colorbox({
      inline:true, href:"#upgradeForFeaturedListings"
    })
    
    $('#bs-listings .button.activate.limitReached').unbind('click').colorbox({
      inline: true, 
      href:'#listingLimitReachedContainer'
    });
    
    // ignore if not correct page...
    if($('#listingEdit').length == 0)
      return false;
        
    submit_button('.formActions .button.submitButton', {before_submit:function(btn_e, e){
      var a = $(e).attr('data-action');
      $('#action_type').val(a);
    }}, '.edit_listing');
    
    // listing location
    self.location.setup();
    
    // upload image(s)
    this.images();
    
		na.wysiwyg_editor.basic('#listing_description');
		
		$('#listing_partial_fee').click(function() {
			var c = $('#partialFeePercentageContainer');
			if($(this).is(':checked')) {
				c.show();
			} else {
				c.hide();
			}
		});
  },
	images: function() {
		var listing_id = $('.edit_listing').attr('id').replace(/[^0-9]/g, '');
		uploader = new na.broker.listing.image.Uploader('#images', listing_id);
		uploader.setup_uploadify('image_file_upload', 0);
				
		uploader = new na.broker.listing.image.Uploader('#floorPlans', listing_id);
		uploader.setup_uploadify('floor_plan_file_upload', 1);
	},
  location: {
    setup: function() {
      var self = this;
      var borough_elm = $('#listing_borough_id');
      // todo: must refactor this into code for use site wide...
      borough_elm.change(function() {
        var id = $(this).val();
        self.getNeighborhood(id);
      });
      // if borough was selected, but not neighborhood
      if(borough_elm.val() != '' && $('#listing_neighborhood_id').val() == '') {
        self.getNeighborhood( borough_elm.val() );
      }
    },
    getNeighborhood: function(borough_id) {
      var html = '<option value="">Please select</option>';
      var n_elm = $('#listing_neighborhood_id');
      if(borough_id == '') {
        n_elm.html(html).attr('disabled', true);
        return false;
      }
      Ajax.get_neighborhoods_by_borough_id(borough_id, function(json) {
        $.each(json.neighborhoods, function(i, n) {
          html += '<option value="' + n.id + '">' + n.name + '</option>';
        });
        n_elm.html(html).attr('disabled', false);
      });
    }
  }
};

var BillingInformation = function() {
  var self = this;

  self.applying_code = false;
  
  $('#applyCouponCode').click(function() {
    var code = $('#couponCode').val();

    if(code.length == 0 || self.applying_code) return false;

    self.applying_code = true;
    $.post('/broker/account/apply_discount_code', {code: code}, function(html){
      $('#error').remove();
      if(html.search(/id=\"error\"/) > -1) {
        $('#newCoupon').prepend(html);
      } else {
        $(html).insertBefore('#newCoupon');
        $('#couponCode').val('');
      }
    });
    self.applying_code = false;
    return false;
  });

};

na.broker.profile_init = function() {
	// entity type selection
	var entity_type = $('input[name=broker[entity_type]]')
	var mysc = $('#myWebSite');
	var cnc = $('#broker_landlord_meta_attributes_company_name').parents('.rowLine');
	var lnc = $('#broker_landlord_meta_attributes_landlord_name').parents('.rowLine');
	
	var setup_entity_meta = function() {
		var v = entity_type.filter(':checked').val();
		var e = $((v == "1") ? '#brokerProfileDetails' : '#landlordProfileDetails');
				
		if(v != "1") {
			mysc.insertAfter(cnc);
		} else {
			mysc.insertAfter(e);
		}
		
		if(v == "3") {
			lnc.show();
		} else {
			lnc.hide();
		}
		
		if(!e.is(':hidden')) {
			return true;
		}
		
		$('#brokerProfileDetails, #landlordProfileDetails').hide();
		e.fadeIn();
	};
	
	entity_type.click(setup_entity_meta);
	setup_entity_meta();
	
	// billing cycles
	var billing_cycles = $('input[name=months_per_billing_cycle]');
  if(billing_cycles.length > 0) {
    billing_cycles.click(function() {
      $('#subscriptionNextRenewalAt').html($(this).attr('data-renewal-date'));
    });
  }
  
	// bio editor
	na.wysiwyg_editor.basic('#broker_bio');
	
	// Brokerage Dropdown	
	var other = $('#broker_brokerage_firm_other');
  var dropdown = $('#brokerageFirm');
  // setup event
  dropdown.change(function() {
    if($(this).val() == "999") {
      other.show();
    } else {
      other.hide();
    }
  });
  
  if(dropdown.val() == "999") {
    other.show();
  }
};

na.broker.renter_search_init = function() {
	if($('#searchWrapperOuter').length > 0) {
		na.search.fancy_dropdowns_init();
		$('#searchButton').click(function() {
      $('#search').submit();
      return false;      
    });
	}
};

var MyOffers = {
  setup: function() { 
    // offers made popup, found in offer inboxes/serp
    this.offersMade();

    $(".contactBlocker a, .contactBlocker").colorbox();
  },   
  offersMade: function() {
    $('.showOffersMadePopup').click(function() {
      var renter_id = $(this).attr('data-id');
      // hide existing popups
      $('.offersMadePopup').fadeOut('fast');
      // add html container for ajax call
      var popup_id = 'offers_made_' + renter_id;
      if($('#' + popup_id).length == 0) {
        $(this).after('<div id="' + popup_id + '" class="offersMadePopup" style="display:none;"></div>');
      }
      var popup_elm = $('#' + popup_id);
      // ajax call for info
      popup_elm.html('<div class="center">' + ajax_loader() + '</div>').fadeIn('fast');
      $.get('/broker/contacts/get_contacts_made/' + renter_id, function(html){
        popup_elm.html(html);
        // setup close button event
        popup_elm.children('.close').click(function() {
          popup_elm.fadeOut('fast');
          return false;
        });
      });
      return false;    
    });    
  }
};

var RenterSearchResults = {
  setup: function() {
    if($('#SERP').length > 0) {
      this.offerPopup();
    }
  },
  offerPopup: function() {
    $('#SERP .showOfferPopup').click(function() {
      // make sure all other popups are closed
      $('#SERP .offerPopup').each(function() {
        $(this).hide();
      });
      $(this).siblings('.offerPopup').fadeIn('fast'); 
      return false;
    });
    $('#SERP .close').click(function() {
      $(this).parent('.offerPopup').fadeOut('fast');
      return false;
    });
  }
};

var Reviews = {
  setup: function() {
    // Request Reviews
    $('#profile .requestReview a').click(function(){
      var elm_id = '#' + $(this).parents('div').attr('id');
      $('#TB_window').unload(function() {
        $(elm_id).fadeOut('fast');
      });
    });

    $('#contactDetails .requestReview a').click(function(){
      var elm = $(this).parents('.reviewPrompt');
      $('#TB_window').unload(function() {
        elm.fadeOut('fast');
      });
    });
  }
};

var Homepage = {
  setup: function() {
    // event tracking
    $('#home #suggestedRenters a').click(function() {
      ga_track_event('Broker: Overview', 'Click', 'suggested renter');
    });
    $('#home #requestReviews a').click(function() {
      ga_track_event('Broker: Overview', 'Click', 'request review');
    });
    $('#home #messages a').click(function() {
      ga_track_event('Broker: Overview', 'Click', 'messages');
    });
    $('#home #brokerHome a').click(function() {
      ga_track_event('Broker: Overview', 'Click', 'welcome message');
    });
    $('#home #hp_feature a').click(function() {
      ga_track_event('Broker: Overview', 'Click', 'new feature');
    });
    
    // Request Reviews
    $('#home .requestReview a').click(function(){
      var elm_id = '#' + $(this).parents('tr').attr('id');
      $('#TB_window').unload(function() {
        $(elm_id).fadeOut('fast');
      });
    });
    this.requestReviews.setup();
  },
  requestReviews: {
    setup: function() {
      var self = this;
      // pagination buttons
      $('#home #requestReviews .resultsPagination a').click(function() {
        var url = $(this).attr('href');
        self.getReviewRequests(url);
        return false;
      });
    },
    getReviewRequests: function(url) {
      var self = this;
      var params = Ajax.parse_url_params(url);
      $.get('/broker/dashboard/get_review_requests?' + params, function(data) {
        $('#home #requestReviews').html(data);
        self.setup();
      });
    }  
  }
};

var planPriceTooltips = function() {
  
  $('.featureTooltip').each(function() {
    var self = this;
    var selector = $(self);
    var html = $(selector.attr('target')).html();
	
    selector.qtip({
      content: {text: html},
      // style options found at: http://craigsworks.com/projects/qtip/docs/reference/#style
      style: {
        name: 'green',
        padding: '10px 15px', 
        background: '#fff',    
        color: '#444',

        width: {
          max: 280,
          min: 0
        },
        border: {
          width: 2,
          radius: 4
        },
        tip: true
      },
      
      classes: {'tooltip': 'qtip'},
      position: {
        corner: {
          target: 'bottomMiddle',
          tooltip: 'topMiddle'
        },
        adjust: {
          screen: true
        }
      }
    }).click(function() {
		return false;
	});
  });

};

na.broker.choosePlan = function() {
	$('#broker_signup #features, #account #features').tabs();
	$('#broker_signup #features #localNav, #account #features #localNav').tabs();
};

/*AJAX HELPER FUNCTIONS */
$.extend(Ajax, {
  get_renter_profile: function(id, elm) {
    if($(elm).html() == '') {
      $(elm).html('<div class="center">' + ajax_loader() + '</div>');

      // ajax request
      $.get('/broker/search/renter-profile/' + id, {partial:1}, function(html) {
        $(elm).html(html);
      });
    }
  }
});


$(document).ready(function() {
  // Setup Events for each page.
  EditListing.setup();
  na.broker.profile_init();
  na.broker.renter_search_init();
  RenterSearchResults.setup();
  MyOffers.setup();
  Reviews.setup();
  Homepage.setup();

  new BillingInformation();
  
  planPriceTooltips();
  

  if($('#broker_signup').length > 0) {
    submit_button('#submitBrokerSignup', {
      after_submit: function(elm) {
        $(elm).after(ajax_loader());
        $(elm).hide();
        $('.cancel').hide();
      }
    });
  }

  if($('#account').length > 0) {
    submit_button('#submitBillingInformation', {
      after_submit: function(elm) {
        $(elm).after(ajax_loader());
        $(elm).hide();
        $('.formActions .cancel').hide();
      }
    }, '#updateBillingInformationForm');
  }
  
  $('#bs-listings #listingstable .addthis_toolbox a').click(function() {
    ga_track_event('Broker: Listings', 'Click', 'share: ' + $(this).attr('title'));
  });
  
});
