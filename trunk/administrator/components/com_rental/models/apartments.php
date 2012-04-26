<?php
/**
 * @version		$Id: apartments.php $
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @author		muinx
 * This component was generated by http://joomlavietnam.net/ - 2012
 */
 
/**
 Generate by Component Gen Code - 2012
 */

defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * Methods supporting a list of Apartments records.
 *
 * @package		Joomla.Administrator
 * @subpackage	com_rental
 * @since		1.6
 */
class RentalModelApartments extends JModelList
{
	/**
	 * Constructor.
	 *
	 * @param	array	An optional associative array of configuration settings.
	 * @see		JController
	 * @since	1.6
	 */
	public function __construct($config = array())
	{
		if (empty($config['filter_fields'])) {
			$config['filter_fields'] = array(
				'id', '#__rental_apartments.id',
				'state', '#__rental_apartments.state',
				'bedrooms', '#__rental_apartments.bedrooms', 'bathrooms', '#__rental_apartments.bathrooms', 'square_ft', '#__rental_apartments.square_ft', 'listed_for', '#__rental_apartments.listed_for', 'available_on', '#__rental_apartments.available_on', 'pets', '#__rental_apartments.pets'
			);
		}

		parent::__construct($config);
	}
	
	
	
	/**
			 * Build a list of authors
			 *
			 * @return	JDatabaseQuery
			 * @since	1.6
			 */
			public function getAuthors() {
				// Create a new query object.
				$db = $this->getDbo();
				$query = $db->getQuery(true);
		
				// Construct the query
				$query->select('u.id AS value, u.name AS text');
				$query->from('#__users AS u');
				$query->join('INNER', '#__rental_apartments AS c ON c.created_by = u.id');
				$query->group('u.id');
				$query->order('u.name');
		
				// Setup the query
				$db->setQuery($query->__toString());
		
				// Return the result
				return $db->loadObjectList();
			}

	/**
	 * Build an SQL query to load the list data.
	 *
	 * @return	JDatabaseQuery
	 * @since	1.6
	 */
	protected function getListQuery()
	{
		// Initialise variables.
		$db		= $this->getDbo();
		$query	= $db->getQuery(true);

		// Select the required fields from the table.
		$query->select(
			$this->getState(
				'list.select',
				'#__rental_apartments.id, #__rental_apartments.state, #__rental_apartments.checked_out AS checked_out, #__rental_apartments.checked_out_time AS checked_out_time, 
				#__rental_apartments.publish_up, #__rental_apartments.publish_down, #__rental_apartments.ordering
				, #__rental_apartments.bedrooms, #__rental_apartments.bathrooms, #__rental_apartments.square_ft, #__rental_apartments.listed_for, #__rental_apartments.available_on, #__rental_apartments.pets'
			)
		);
		$query->from('`#__rental_apartments`');

		// Join over the users for the checked out user.
		$query->select('uc.name AS editor');
		$query->join('LEFT', '#__users AS uc ON uc.id=#__rental_apartments.checked_out');
		
		// Join over the retal_agents
$query->select('retal_agents_0.first_name AS retal_agents_0_first_name, retal_agents_0.last_name AS retal_agents_0_last_name');
$query->join('INNER', '#__retal_agents AS retal_agents_0 ON retal_agents_0.id = #__rental_apartments.agent_id');


		
		// Filter by published state
							$published = $this->getState('filter.state');
							if (is_numeric($published)) {
								$query->where('#__rental_apartments.state = '.(int) $published);
							} else if ($published === '') {
								$query->where('(#__rental_apartments.state IN (0, 1))');
							}
						// Filter by author
							$authorId = $this->getState('filter.author_id');
							if (is_numeric($authorId)) {
								$type = $this->getState('filter.author_id.include', true) ? '= ' : '<>';
								$query->where('#__rental_apartments.created_by '.$type.(int) $authorId);
							}
		
		// Filter by search
						$search = $this->getState('filter.search');
						if (!empty($search))
						{							
							$searchLike = $db->Quote('%'.$db->getEscaped($search, true).'%');
							$search = $db->Quote($db->getEscaped($search, true));
						$query->where('(#__rental_apartments.id = '.$search.' OR #__rental_apartments.bedroom = '.$search.')');
							} //end search
		
		// Add the list ordering clause.
		$orderCol	= $this->state->get('list.ordering');
		$orderDirn	= $this->state->get('list.direction');
		
		$query->order($db->getEscaped($orderCol.' '.$orderDirn));

		//echo nl2br(str_replace('#__','jos_',$query));
		return $query;
	}

	/**
	 * Returns a reference to the a Table object, always creating it.
	 *
	 * @param	type	The table type to instantiate
	 * @param	string	A prefix for the table class name. Optional.
	 * @param	array	Configuration array for model. Optional.
	 * @return	JTable	A database object
	 * @since	1.6
	 */
	public function getTable($type = 'Apartments', $prefix = 'RentalTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
	 * @since	1.6
	 */
	protected function populateState($ordering = null, $direction = null)
	{
		// Initialise variables.
		$app = JFactory::getApplication('administrator');

		// Load the filter state.
		$search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
							$this->setState('filter.search', $search);
		
		$state = $this->getUserStateFromRequest($this->context.'.filter.state', 'filter_state', '', 'string');
							$this->setState('filter.state', $state);
		
		
		
		
		
		$authorId = $app->getUserStateFromRequest($this->context.'.filter.author_id', 'filter_author_id');
							$this->setState('filter.author_id', $authorId);

		// List state information.
		parent::populateState('#__rental_apartments.id', 'DESC');
	}
}