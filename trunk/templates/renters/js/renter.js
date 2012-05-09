
var SearchListings = {
  setup: function() {
    $('#searchButton').click(function() {
      $('#search').submit();
      return false;
    });

		na.search.fancy_dropdowns_init();
    
    $('#saveSearchButton').colorbox({
      onComplete: function() {
        $(this).hide();
        ga_track_event('Listing Search', 'Click', 'Saved search');
      }
    });
		
		// tracking for related serp results
		$('#relatedListings li a').click(function() {
			ga_track_event('Listing Search', 'Click', 'related listing');
		});

		$('#relatedListings #viewAllRelated').click(function() {
			ga_track_event('Listing Search', 'Click', 'view all related listings');
		});
  },
  highlightRow: function(self, is_selected) {
    if(is_selected) {
      $(self).addClass('highlightRow');
    } else {
      $(self).removeClass('highlightRow');
    }
  }
};

var Reviews = {
  setup: function() {
    if($('#reviewPublish').length > 0) {
      this.rating.setup();
      $('#previewReview').click(function() {
        var j_elm = $('#reviewPublish #thanksBoxWide');
        var url = '/renter/reviews/preview';
        if($('.edit_review').length > 0) {
          url = j_elm.attr('action').replace('publish', 'preview');
        }
        j_elm.attr('action', url);
        j_elm.submit();
        return false;
      });
      $('#editReview').click(function() {
        var j_elm = $('#reviewPreview');
        var url = '/renter/reviews/preview';
        if($('.edit_review').length > 0) {
          url = j_elm.attr('action').replace('publish', 'edit');
        }else if($('.new_review').length > 0) {
          url = j_elm.attr('action').replace('publish', 'new');
        }
        j_elm.attr('action', url);
        j_elm.submit();
        return false;
      });
    }
		
		// v2 form
		var responded_sel = $('input[name=review[responded_to_inquiry]]');
		var comments_c = $('#commentsContainer');
		var orating_c = $('#overallRatingContainer');
		var rented_c = $('#rentedApartmentContainer');
		var actions = $('.formActions');
		
		var setup_responded_form = function() {
			hide_responded_fields();
			
			if(responded_sel.filter(':checked').val() == 'true') {
				comments_c.show();
				rented_c.show();
			}
			orating_c.show();
		};
		
		var hide_responded_fields = function() {
			comments_c.hide();
			rented_c.hide();
			orating_c.hide();
			actions.hide();
		};
		
		if(responded_sel.length > 0) {
			if(responded_sel.is(':checked')) {
				setup_responded_form();
				actions.show();
			} else {
				hide_responded_fields();
			}
		}
		
		responded_sel.click(function() {
			// $('#respondedToInquiryContainer').hide();
			setup_responded_form();
			actions.show();
		});
  },
  rating: {
    setup: function() {
      var self = this;
      // click event
      this.select();
      // set hidden field values
      var hidden_fields = ['overall','honesty','reliability','listings'];
      $.each(hidden_fields, function(i, v) {
        var hf_id = '#review_' + v + '_rating';
        var rating = $(hf_id).val();
        
        if(rating != "") {
          rating = parseInt(rating);
        } else {
          return true;
        }
         
        $(hf_id).siblings('.star-rating').children('li').each(function() {
          var a = $(this).children('a');
          var r = parseInt( a.html() );
          if(r == rating) {
            self.highlight(a);
          }
        });
      });
    },
    select: function() {
      var self = this;
      $('.star-rating li a').click(function() {
        self.highlight(this);
        return false;
      });
    },
    highlight: function(parent) {
      var rating = parseInt($(parent).html());
      
      $(parent).parent('li').siblings('li').each(function() {
        var r = parseInt($(this).children('a').html());
        $(this).removeClass('current-rating');
        if(r <= rating) {
          $(this).addClass('current-rating');
        }
      });
      $(parent).parent('li').addClass('current-rating');
      // add value to hidden field
      $(parent).parent('li').parent('ul').parent('.row').find('input').val(rating);
    }
  }
};

var RenterProfile = {
  setup: function() {
    if($('#renter_signup').length > 0) {
      this.neccessityRating.setup();
      this.signup();
      this.credit_check();
    }
    
    if($('#renter_profile, #preferences').length > 0) {
      this.neccessityRating.setup();
      
      var survey_elm = $('#emailNotificationsSurvery');
      $('#user_notify_by_email_false').click(function() {
        if($(this).is(':checked')) survey_elm.show();
      });
      
      $('#user_notify_by_email_true').click(function() {
        if($(this).is(':checked')) survey_elm.hide();
      });
    }

    $('#selectApartmentSize .checkboxContSm, .boroughs .checkboxCont').click(function(event) {
      if(event.target.nodeName.toLowerCase() == 'input') return true;
      var i = $(this).children('input');
      i.attr('checked', !i.is(':checked'));
      return false;
    });

    
    // show/hide help comments onfocus
    $.each(['email', 'phone', 'salary', 'credit', 'guarantor'], function(index, id) {
      $('#' + id + ' input').focus(function() {
        $('#' + id + ' .help').fadeIn('fast');
        return false;
      }).focusout(function() {
        $('#' + id + ' .help').fadeOut('fast');
        return false;
      });
    });
    
		this.roommates();
  },
  agree_to_terms: function(elm) {
    // have they agreed to the terms?
    if($('#agreeToTerms').attr('checked') == false) {
      alert('You must agree to the Naked Apartments Terms of Service before continuing.');
      return false;
    }
  },
  signup: function() {
    // once this is added to broker side, need to move to global function
    var other = $('#renter_user_referral_other');
    var dropdown = $('#userReferralOption');
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

    var after_submit = function(elm) {
        $('.formActions').html(ajax_loader_centered());
    };
		
    submit_button('#renterSignupSelfReport', {
      before_submit: this.agree_to_terms,
      after_submit: after_submit
    });
  },
	roommates: function() {
		var current_input_index = function(input) {
			return parseInt(input.attr('id').match(/[0-9]/)[0])
		};
		
		var delete_row = function() {
			var li = $(this).parent();
			
			if(li.find('input').length == 2) {
				li.append('<input type="hidden" name="renter[roommates_attributes][' + current_input_index(li.find('input:first')) + '][_destroy]" value="1" />').hide();
			} else {
				li.remove();
			}
			
			return false;
		};
		
		// TODO: refactor so logic can be used in other similar forms
		$('#addRoommatesEmail').live('click', function(){
			var email_field = $('#roommmatesEmail');
			var email = email_field.val();
			if(email.length == 0) {
				return false;
			}
			
			var i = 0;
			var l_elm = $('#roommateEntries li:last input');
			if(l_elm.length > 0) {
				i = current_input_index(l_elm) + 1;
			}
			
			var html = '<li>' + email + '<input id="renter_roommates_attributes_' + i + '_email" type="hidden" value="' + email + '" name="renter[roommates_attributes][' + i + '][email]" /> <a href="#" class="button icon delete"><span></span></a></li>';
			
			$('#roommateEntries').append(html).find('.delete').unbind('click').click(delete_row);
			email_field.val('');
			return false;
		});
		
		$('#roommateEntries .delete').click(delete_row);
	},
	// deprecated
  credit_check: function() {},
	// deprecated
  neccessityRating: {
    setup: function() {}
  }
};

var RenterHomepage = {
  setup: function() {
    $('.modsub ul li').naSimpleTabs();
    
    $('#home .invitedOffer a').click(function() {
      var self = this;
      $('#TB_window').unload(function() {
        if($('#suggestedListings tr').length == 1) {
          refresh_page();
          return false;
        }
        // fade out + remove row
        $(self).parents('tr').fadeOut('fast').remove();
      });
      return false;
    });
  }
};

var AnonymousRenter = {
  alert: {
    init: function(open_modal) {
      var self = this;
      if(open_modal && $.cookie('anon_renter_suggestions') != '1') {
        $.fn.colorbox({
          inline: true,
          open: true,
          href: '#anonymousSuggestionsContainer',
          onComplete: function(){
            self.form();
            ga_track_event('Listing Search', 'Open', 'listings alert: signup form');
          },
          onClosed: self.disable
        });
      }
      
      $('#renterSearchAlert').colorbox({
        inline: true,
        href: '#anonymousSuggestionsContainer',
        onComplete: function(){
          self.form(true);
          ga_track_event('Listing Search', 'Click', 'listings alert: signup form');
        }
      });
    }, 
    form: function(remove_serp_button) {
      var self = this;
      $('#noThanks').click(function() {
        $.colorbox.close();
        ga_track_event('Listing Search', 'Click', 'listings alert: no thanks');
      });
      rollover_button('#cboxLoadedContent .btnGreen');
      
      // AJAX form
      var options = {
        'success': function(response) {
          $("#cboxLoadedContent").html(response);
          $.colorbox.resize();
          
          if($('#errorExplanation').length > 0) {
            self.form();
            submit_button('#cboxLoadedContent .submitButton');
          } else {
            if(remove_serp_button)
              $('#renterSearchAlert').hide();
            self.disable();
          }
        }
      };
      $('#anonSuggestionSignup form').ajaxForm(options);
    },
    disable: function() {
      $.cookie('anon_renter_suggestions', '1');
    }
  }
};


(function($) {
  /**
   * Listing Favorites Buttons
   */
  $.fn.listingFavoriteButtons = function(callback) {
    var sel = this;
		var f_class = 'favorited';
				
    $(sel).click(function() {
      var elm = this;
      is_span = (elm.nodeName.toLowerCase() == 'span');
      if(is_span) {
        elm = $(elm).children('a');
			}
			
			elm = $(elm);

      // ajax request
      var listing_id = elm.attr('data-id');
      var type = (elm.attr('href').search('add_') != -1) ? 'add' : 'delete'
			var qtip_api = elm.qtip("api");

      $.getJSON(elm.attr('href') + '.json', function(data) {
				if(typeof callback == 'function')
          callback(listing_id, type, qtip_api);
      });
						
      // update button
      if(type == 'add') {
        elm.attr('href', elm.attr('href').replace('add_', 'delete_'));
				
        if(is_span) {
          elm.parent().addClass(f_class);
        } else {
          elm.addClass(f_class);
				}
				
				qtip_api.updateContent('Remove from Favorites');
				
				ga_track_event('Site Wide', 'Click', 'listing: add favorite');
      } else {
        elm.attr('href', elm.attr('href').replace('delete_', 'add_'));
				
        if(is_span) {
          elm.parent().removeClass(f_class).removeClass('active');
        } else {
          elm.removeClass(f_class).removeClass('active');
      	}
				
				qtip_api.updateContent('Save to Favorites');
			}

      return false;
    });
  };

})(jQuery);


/* AJAX HELPER FUNCTIONS EXTENDED ************************************ */
Ajax = $.extend(Ajax, {
  get_broker_profile: function(url, elm) {
    if($(elm).html() == '') {
      $(elm).html(ajax_loader_centered());

      // ajax request
      $.get(url, {partial:1}, function(html) {
        $(elm).html(html);
        new ContactAgent();
      });
    }
  }
});


$(document).ready(function() {
  SearchListings.setup();
  Reviews.setup();
  RenterProfile.setup();
  RenterHomepage.setup();

  $('#listingDetail .favorite:not(.infoModal)').listingFavoriteButtons();
  $('#listingSERPOuter .favorite').listingFavoriteButtons(function(listing_id, type, qtip_api) {
    if(type == 'delete') {
      $('#listing_' + listing_id + '_row1, #listing_' + listing_id + '_row2').remove();
      if($('#listingSERPTable tbody tr').length == 0)
        refresh_page();
			qtip_api.hide();
    }
  });
  $('#favoritedListings .favorite').listingFavoriteButtons(function(listing_id, type, qtip_api) {
    if(type == 'delete') {
      $('#listing_favorite_' + listing_id).remove();
      if($('#favoritedListings tbody tr').length == 0)
        refresh_page();
			qtip_api.hide();
    }
  });
});
