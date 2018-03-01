<?php
class RaspsearchHelper {
    static function getStations()
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query
            ->select('*')
            ->from('#__rw2_stations_active');
        $res = $db->setQuery($query)->loadAssocList();
        return $res;
    }
}