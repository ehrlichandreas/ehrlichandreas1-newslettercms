<?php

/**
 * 
 * @author Ehrlich, Andreas <ehrlich.andreas@googlemail.com>
 */
class EhrlichAndreas_NewsletterCms_ModuleExtended extends EhrlichAndreas_NewsletterCms_Module
{
    /**
     * 
     * @param string $project_id
     * @return mixed
     */
    protected function _getProjectId($project_id)
    {
        if (is_array($project_id))
        {
            if (isset($project_id['project_id']))
            {
                $project_id = $project_id['project_id'];
            }
            elseif (isset($project_id['project']))
            {
                $param = $project_id['project'];
            
                $param['cols'] = array
                (
                    'project_id'
                );

                $rowset = $this->getProjectList($param);
                
                if (count($rowset) == 0)
                {
                    $project_id = $this->addProject($param);

                    return $project_id;
                }
                
                foreach ($rowset as $row)
                {
                    return $row['project_id'];
                }
            }
            else
            {
                return false;
            }
        }
        
        return $project_id;
    }
    
    /**
     * 
     * @param string $topic_id
     * @return mixed
     */
    protected function _getTopicId($topic_id)
    {
        if (is_array($topic_id))
        {
            if (isset($topic_id['topic_id']))
            {
                $topic_id = $topic_id['topic_id'];
            }
            elseif (isset($topic_id['topic']))
            {
                $param = $topic_id['topic'];
            
                $param['cols'] = array
                (
                    'topic_id'
                );

                $rowset = $this->getTopicList($param);
                
                if (count($rowset) == 0)
                {
                    $topic_id = $this->addTopic($param);

                    return $topic_id;
                }
                
                foreach ($rowset as $row)
                {
                    return $row['topic_id'];
                }
            }
            else
            {
                return false;
            }
        }
        
        return $topic_id;
    }
    
    /**
     * 
     * @param array $params
     * @return boolean
     */
    public function addFullAddresseeData($params = array())
    {
        if (count($params) == 0)
        {
            return false;
        }
        
        
        $project_id = $this->_getProjectId($params);
        
        $topic_id = $this->_getTopicId($params);
        
        
        unset($params['project_id']);
        
        unset($params['project']);
        
        unset($params['topic_id']);
        
        unset($params['topic']);
        
        
        $addresseeFields = $this->getFieldsAddressee();
        
        $addresseeFields = array_combine($addresseeFields, $addresseeFields);
        
        
        $addresseeProperties = array();
        
        foreach ($params as $fieldName => $fieldValue)
        {
            if (is_string($fieldName) && !isset($addresseeFields[$fieldName]))
            {
                $addresseeProperties[$fieldName] = $fieldValue;
            }
        }
        
        
        $param = $params;
        
        $addressee_id = $this->addAddressee($param);
        
        
        foreach ($addresseeProperties as $fieldName => $fieldValue)
        {
            $param = array
            (
                'addressee_id'  => $addressee_id,
                'field_name'    => $fieldName,
                'field_value'   => $fieldValue,
            );

            $this->addAddresseeProperties($param);
        }
        
        
        if ($project_id !== false)
        {
            $param = array
            (
                'addressee_id'  => $addressee_id,
                'project_id'    => $project_id,
            );

            $this->addAddresseeToProject($param);
        }
        
        
        if ($topic_id !== false)
        {
            $param = array
            (
                'addressee_id'  => $addressee_id,
                'topic_id'      => $topic_id,
            );

            $this->addAddresseeToTopic($param);
        }
        
        
        if ($project_id !== false && $topic_id !== false)
        {
            $param = array
            (
                'topic_id'      => $topic_id,
                'project_id'    => $project_id,
            );

            $this->addTopicToProjectExt($param);
        }
        
        
        return $addressee_id;
    }
    
    public function addTopicToProjectExt($params = array())
    {
        if (count($params) == 0)
        {
            return false;
        }
        
        
        $project_id = $this->_getProjectId($params);
        
        $topic_id = $this->_getTopicId($params);
        
        
        if ($project_id !== false && $topic_id !== false)
        {
            $param = array
            (
                'topic_id'      => $topic_id,
                'project_id'    => $project_id,
            );

            $rowset = $this->getTopicToProject($param);

            if (empty($rowset))
            {
                $this->addTopicToProject($param);
            }
        }
    }
    
    public function getAddresseeData($params = array())
    {
        $dbConnection = $this->getConnection();
        
        
        $fieldsAddressee = $this->getFieldsAddressee();
        
        $fieldsAddressee = array_combine($fieldsAddressee, $fieldsAddressee);
        
        
        $paramAddressee = array();
        
        $paramAddresseeProperties = array();
        
        
        foreach ($params as $key => $value)
        {
            if (isset($fieldsAddressee[$key]))
            {
                $paramAddressee[$key] = $value;
            }
            else
            {
                $paramAddresseeProperties[$key] = $value;
            }
        }
        
        
        $addresseeId = array();
        
        if (isset($paramAddressee['addressee_id']))
        {
            $addresseeId[] = $paramAddressee['addressee_id'];
        }
        elseif (count($paramAddressee) > 0)
        {
            $param = array
            (
                'cols'  => array
                (
                    'addressee_id'  => 'addressee_id',
                ),
                'where' => $paramAddressee,
            );
            
            $rowset = $this->getAddresseeList($param);
            
            foreach ($rowset as $row)
            {
                $addresseeId[] = $row['addressee_id'];
            }
        }
        elseif (count($paramAddresseeProperties) > 0)
        {
            $where = array();
            
            foreach ($paramAddresseeProperties as $fieldName => $fieldValue)
            {
                $whereTmp = array
                (
                    $dbConnection->quoteInto('field_name = ?', $fieldName),
                    $dbConnection->quoteInto('field_value = ?', $fieldValue),
                );
                
                $whereTmp = implode(' AND ', $whereTmp);
                
                $whereTmp = '(' . $whereTmp . ')';
                
                $where[] = $whereTmp;
            }
            
            $where = implode(' OR ', $where);
            
            
            $param = array
            (
                'cols'  => array
                (
                    'addressee_id'  => 'addressee_id',
                ),
                'where' => $where,
            );
            
            $rowset = $this->getAddresseePropertiesList($param);
            
            foreach ($rowset as $row)
            {
                $addresseeId[$row['addressee_id']] = $row['addressee_id'];
            }
        }
        
        
        $param = array
        (
            'where' => array
            (
                'addressee_id'  => $addresseeId,
            ),
        );
        
        $addresseeList = $newsletterCmsModule->getAddresseeList($param);
        
        $addresseePropertiesList = $newsletterCmsModule->getAddresseePropertiesList($param);
        
        
        $addresseeListTmp = array();
        
        foreach ($addresseeList as $addressee)
        {
            $addresseeListTmp[$addressee['addressee_id']] = $addressee;
        }
        
        $addresseeList = $addresseeListTmp;
        
        
        $addresseePropertiesListTmp = array();
        
        foreach ($addresseePropertiesList as $addresseeProperty)
        {
            $addresseePropertiesListTmp[$addresseeProperty['addressee_id']][$addresseeProperty['addressee_properties_id']] = $addresseeProperty;
        }
        
        $addresseePropertiesList = $addresseePropertiesListTmp;
        
        
        foreach ($addresseeList as $addressee_id => $addressee)
        {
            if (!isset($addresseePropertiesList[$addressee_id]))
            {
                $addresseePropertiesList[$addressee_id] = array();
            }
            
            foreach ($addresseePropertiesList[$addressee_id] as $addresseeProperty)
            {
                if (!isset($addressee[$addresseeProperty['field_name']]))
                {
                    $addressee[$addresseeProperty['field_name']] = $addresseeProperty['field_value'];
                }
            }
            
            $addresseeList[$addressee_id] = $addressee;
        }
        
        
        $addresseeList = array_values($addresseeList);
        
        
        return $addresseeList;
    }
    
    public function editAddresseeData($params = array())
    {
        if (count($params) == 0)
        {
            return false;
        }
        
        
        $dbConnection = $this->getConnection();
        
        
        $fieldsAddressee = $this->getFieldsAddressee();
        
        $fieldsAddressee = array_combine($fieldsAddressee, $fieldsAddressee);
        
        
        $paramAddressee = array();
        
        $paramAddresseeProperties = array();
        
        foreach ($params as $key => $value)
        {
            if (isset($fieldsAddressee[$key]))
            {
                $paramAddressee[$key] = $value;
            }
            else
            {
                $paramAddresseeProperties[$key] = $value;
            }
        }
        
        
        $addresseeId = array();
        
        if (isset($paramAddressee['addressee_id']))
        {
            $addresseeId[] = $paramAddressee['addressee_id'];
        }
        elseif (count($paramAddressee) > 0)
        {
            $param = array
            (
                'cols'  => array
                (
                    'addressee_id'  => 'addressee_id',
                ),
                'where' => $paramAddressee,
            );
            
            $rowset = $this->getAddresseeList($param);
            
            foreach ($rowset as $row)
            {
                $addresseeId[$row['addressee_id']] = $row['addressee_id'];
            }
        }
        elseif (count($paramAddresseeProperties) > 0)
        {
            $where = array();
            
            foreach ($paramAddresseeProperties as $fieldName => $fieldValue)
            {
                $whereTmp = array
                (
                    $dbConnection->quoteInto('field_name = ?', $fieldName),
                    $dbConnection->quoteInto('field_value = ?', $fieldValue),
                );
                
                $whereTmp = implode(' AND ', $whereTmp);
                
                $whereTmp = '(' . $whereTmp . ')';
                
                $where[] = $whereTmp;
            }
            
            $where = implode(' OR ', $where);
            
            
            $param = array
            (
                'cols'  => array
                (
                    'addressee_id'  => 'addressee_id',
                ),
                'where' => $where,
            );
            
            $rowset = $this->getAddresseePropertiesList($param);
            
            foreach ($rowset as $row)
            {
                $addresseeId[$row['addressee_id']] = $row['addressee_id'];
            }
        }
        
        if (count($addresseeId) <= 0)
        {
            return false;
        }
        
        
        $param = $paramAddressee;
        
        $param['where']['addressee_id'] = $addresseeId;
        
        $edited = $this->editAddressee($param);
        
        
        $paramSelect = array
        (
            'cols' => array
            (
                'count' => new Zend_Db_Expr('count(addressee_properties_id)'),
            ),
            'where' => array
            (
                'addressee_id'  => $addresseeId,
            ),
        );
        
        $paramEdit = array
        (
            'where' => array
            (
                'addressee_id'  => $addresseeId,
            ),
        );
        
        
        foreach ($paramAddresseeProperties as $fieldName => $fieldValue)
        {
            $paramSelect['where']['field_name'] = $fieldName;
            
            $rowset = $this->getAddresseeProperties($paramSelect);
            
            if ($rowset[0]['count'] > 0)
            {
                $paramEdit['field_value'] = $fieldValue;
                
                $paramEdit['where']['field_name'] = $fieldName;
                
                $edited += $this->editAddresseeProperties($paramEdit);
            }
            else
            {
                foreach ($addresseeId as $id)
                {
                    $param = array
                    (
                        'addressee_id'  => $id,
                        'field_name'    => $fieldName,
                        'field_value'   => $fieldValue,
                    );

                    $edited += $this->addAddresseeProperties($param);
                }
            }
        }
        
        return $edited;
    }
    
    /**
     * 
     * @param mixed $addressee_id
     * @return array
     */
    public function getReadyNewsletterByAddresseeId($addressee_id)
    {
        $param = array
        (
            'addressee_id'  => $addressee_id,
        );
        
        $queueUnreadyRowset = $this->getNewsletterQueueReady($param);
        
        $newsletter_final_id = array();
        
        foreach ($queueUnreadyRowset as $queueUnready)
        {
            $newsletter_final_id[$queueUnready['newsletter_final_id']] = $queueUnready['newsletter_final_id'];
        }
        
        if (!empty($newsletter_final_id))
        {
            $param = array
            (
                'newsletter_final_id'   => $newsletter_final_id,
            );
        
            return $this->getNewsletterFinal($param);
        }
        
        return array();
    }
    
    /**
     * 
     * @param mixed $addressee_id
     * @return array
     */
    public function getUnreadyNewsletterByAddresseeId($addressee_id)
    {
        $param = array
        (
            'addressee_id'  => $addressee_id,
        );
        
        $queueUnreadyRowset = $this->getNewsletterQueueUnready($param);
        
        $newsletter_final_id = array();
        
        foreach ($queueUnreadyRowset as $queueUnready)
        {
            $newsletter_final_id[$queueUnready['newsletter_final_id']] = $queueUnready['newsletter_final_id'];
        }
        
        if (!empty($newsletter_final_id))
        {
            $param = array
            (
                'newsletter_final_id'   => $newsletter_final_id,
            );
        
            return $this->getNewsletterFinal($param);
        }
        
        return array();
    }
    
    /**
     * 
     * @param mixed $addressee_id
     * @return array
     */
    public function setReadyNewsletter($addressee_id, $newsletter_final_id)
    {
        if (is_scalar($newsletter_final_id))
        {
            $newsletter_final_id = array
            (
                $newsletter_final_id,
            );
        }
        
        $param = array
        (
            'addressee_id'          => $addressee_id,
            'newsletter_final_id'   => $newsletter_final_id,
        );
        
        $this->deleteNewsletterQueueUnready($param);
        
        foreach ($newsletter_final_id as $id)
        {
            $param = array
            (
                'cols'  => array
                (
                    'count' => new EhrlichAndreas_Db_Expr('count(newsletter_queue_ready_id)'),
                ),
                'where' => array
                (
                    'addressee_id'          => $addressee_id,
                    'newsletter_final_id'   => $id,
                ),
            );
            
            $rowset = $this->getNewsletterQueueReady($param);
            
            if (count($rowset) == 0 || $rowset[0]['count'] == 0)
            {
                $param = array
                (
                    'addressee_id'          => $addressee_id,
                    'newsletter_final_id'   => $id,
                );

                $this->addNewsletterQueueReady($param);
            }
        }
    }
    
    /**
     * 
     * @param mixed $addressee_id
     * @return array
     */
    public function setUnreadyNewsletter($addressee_id, $newsletter_final_id)
    {
        if (is_scalar($newsletter_final_id))
        {
            $newsletter_final_id = array
            (
                $newsletter_final_id,
            );
        }
        
        $param = array
        (
            'addressee_id'          => $addressee_id,
            'newsletter_final_id'   => $newsletter_final_id,
        );
        
        $this->deleteNewsletterQueueReady($param);
        
        foreach ($newsletter_final_id as $id)
        {
            $param = array
            (
                'cols'  => array
                (
                    'count' => new EhrlichAndreas_Db_Expr('count(newsletter_queue_unready_id)'),
                ),
                'where' => array
                (
                    'addressee_id'          => $addressee_id,
                    'newsletter_final_id'   => $id,
                ),
            );
            
            $rowset = $this->getNewsletterQueueUnready($param);
            
            if (count($rowset) == 0 || $rowset[0]['count'] == 0)
            {
                $param = array
                (
                    'addressee_id'          => $addressee_id,
                    'newsletter_final_id'   => $id,
                );

                $this->addNewsletterQueueUnready($param);
            }
        }
    }
}

