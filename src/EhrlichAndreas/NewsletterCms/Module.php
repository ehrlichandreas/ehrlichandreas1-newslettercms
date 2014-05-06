<?php 

/**
 * 
 * @author Ehrlich, Andreas <ehrlich.andreas@googlemail.com>
 */
class EhrlichAndreas_NewsletterCms_Module extends EhrlichAndreas_AbstractCms_Module
{
    /**
     *
     * @var string
     */
    private $tableAddressee = 'newsletter_addressee';

    /**
     *
     * @var string
     */
    private $tableAddresseeProperties = 'newsletter_addressee_properties';

    /**
     *
     * @var string
     */
    private $tableAddresseeToProject = 'newsletter_addressee_project';

    /**
     *
     * @var string
     */
    private $tableAddresseeToTopic = 'newsletter_addressee_topic';

    /**
     *
     * @var string
     */
    private $tableEmailTemplate = 'newsletter_email_template';

    /**
     *
     * @var string
     */
    private $tableEmailTemplateCode = 'newsletter_email_template_code';

    /**
     *
     * @var string
     */
    private $tableNewsletterFinal = 'newsletter_final';

    /**
     *
     * @var string
     */
    private $tableNewsletterQueueReady = 'newsletter_queue_ready';

    /**
     *
     * @var string
     */
    private $tableNewsletterQueueUnready = 'newsletter_queue_unready';

    /**
     *
     * @var string
     */
    private $tableNewsletterTemplate = 'newsletter_template';

    /**
     *
     * @var string
     */
    private $tableProject = 'newsletter_project';

    /**
     *
     * @var string
     */
    private $tableTextFinal = 'newsletter_text_final';

    /**
     *
     * @var string
     */
    private $tableTextTemplate = 'newsletter_text_template';

    /**
     *
     * @var string
     */
    private $tableTopic = 'newsletter_topic';

    /**
     *
     * @var string
     */
    private $tableTopicToProject = 'newsletter_topic_project';
    
    /**
     * Constructor
     * 
     * @param array $options
     *            Associative array of options
     * @throws EhrlichAndreas_NewsletterCms_Exception
     * @return void
     */
    public function __construct ($options = array())
    {
        $options = $this->_getCmsConfigFromAdapter($options);
        
        if (! isset($options['adapterNamespace']))
        {
            $options['adapterNamespace'] = 'EhrlichAndreas_NewsletterCms_Adapter';
        }
        
        if (! isset($options['exceptionclass']))
        {
            $options['exceptionclass'] = 'EhrlichAndreas_NewsletterCms_Exception';
        }
        
        parent::__construct($options);
    }
    
    /**
     * 
     * @return EhrlichAndreas_NewsletterCms_Module
     */
    public function install()
    {
        $this->adapter->install();
        
        return $this;
    }

    /**
     * 
     * @return string
     */
    public function getTableAddressee ()
    {
        return $this->adapter->getTableName($this->tableAddressee);
    }

    /**
     * 
     * @return string
     */
    public function getTableAddresseeProperties ()
    {
        return $this->adapter->getTableName($this->tableAddresseeProperties);
    }

    /**
     * 
     * @return string
     */
    public function getTableAddresseeToProject ()
    {
        return $this->adapter->getTableName($this->tableAddresseeToProject);
    }

    /**
     * 
     * @return string
     */
    public function getTableAddresseeToTopic ()
    {
        return $this->adapter->getTableName($this->tableAddresseeToTopic);
    }

    /**
     * 
     * @return string
     */
    public function getTableEmailTemplate ()
    {
        return $this->adapter->getTableName($this->tableEmailTemplate);
    }

    /**
     * 
     * @return string
     */
    public function getTableEmailTemplateCode ()
    {
        return $this->adapter->getTableName($this->tableEmailTemplateCode);
    }

    /**
     * 
     * @return string
     */
    public function getTableNewsletterFinal ()
    {
        return $this->adapter->getTableName($this->tableNewsletterFinal);
    }

    /**
     * 
     * @return string
     */
    public function getTableNewsletterTemplate ()
    {
        return $this->adapter->getTableName($this->tableNewsletterTemplate);
    }

    /**
     * 
     * @return string
     */
    public function getTableNewsletterQueueReady ()
    {
        return $this->adapter->getTableName($this->tableNewsletterQueueReady);
    }

    /**
     * 
     * @return string
     */
    public function getTableNewsletterQueueUnready ()
    {
        return $this->adapter->getTableName($this->tableNewsletterQueueUnready);
    }

    /**
     * 
     * @return string
     */
    public function getTableProject ()
    {
        return $this->adapter->getTableName($this->tableProject);
    }
	
    /**
     * 
     * @return string
     */
    public function getTableTextFinal ()
    {
        return $this->adapter->getTableName($this->tableTextFinal);
    }

    /**
     * 
     * @return string
     */
    public function getTableTextTemplate ()
    {
        return $this->adapter->getTableName($this->tableTextTemplate);
    }

    /**
     * 
     * @return string
     */
    public function getTableTopic ()
    {
        return $this->adapter->getTableName($this->tableTopic);
    }

    /**
     * 
     * @return string
     */
    public function getTableTopicToProject ()
    {
        return $this->adapter->getTableName($this->tableTopicToProject);
    }

    /**
     * 
     * @return array
     */
    public function getFieldsAddressee ()
    {
        return array
		(
			'addressee_id'      => 'addressee_id',
            'published'         => 'published',
            'updated'           => 'updated',
            'enabled'           => 'enabled',
            'salutation'        => 'salutation',
            'gender'            => 'gender',
            'name'              => 'name',
            'firstname'         => 'firstname',
            'secondname'        => 'secondname',
            'email'             => 'email',
            'registered'        => 'registered',
            'registered_ip'     => 'registered_ip',
            'confirmed'         => 'confirmed',
            'confirmed_ip'      => 'confirmed_ip',
            'unsubscribed'      => 'unsubscribed',
            'unsubscribed_ip'   => 'unsubscribed_ip',
            'banned'            => 'banned',
		);
    }

    /**
     * 
     * @return array
     */
    public function getFieldsAddresseeProperties ()
    {
        return array
		(
			'addressee_properties_id'   => 'addressee_properties_id',
            'published'                 => 'published',
            'updated'                   => 'updated',
            'enabled'                   => 'enabled',
			'addressee_id'              => 'addressee_id',
            'field_name'                => 'field_name',
            'field_value'               => 'field_value',
		);
    }

    /**
     * 
     * @return array
     */
    public function getFieldsAddresseeToProject ()
    {
        return array
		(
			'addressee_project_id'  => 'addressee_project_id',
            'published'             => 'published',
            'updated'               => 'updated',
            'enabled'               => 'enabled',
            'addressee_id'          => 'addressee_id',
            'project_id'            => 'project_id',
		);
    }

    /**
     * 
     * @return array
     */
    public function getFieldsAddresseeToTopic ()
    {
        return array
		(
			'addressee_topic_id'    => 'addressee_topic_id',
            'published'             => 'published',
            'updated'               => 'updated',
            'enabled'               => 'enabled',
            'addressee_id'          => 'addressee_id',
            'topic_id'              => 'topic_id',
		);
    }

    /**
     * 
     * @return array
     */
    public function getFieldsEmailTemplate ()
    {
        //TODO
        return array
		(
			'email_template_id' => 'email_template_id',
            'published'         => 'published',
            'updated'           => 'updated',
            'enabled'           => 'enabled',
			'' => '',
		);
    }

    /**
     * 
     * @return array
     */
    public function getFieldsEmailTemplateCode ()
    {
        //TODO
        return array
		(
			'email_template_code_id'    => 'email_template_code_id',
            'published'                 => 'published',
            'updated'                   => 'updated',
            'enabled'                   => 'enabled',
			'' => '',
		);
    }

    /**
     * 
     * @return array
     */
    public function getFieldsNewsletterFinal ()
    {
        //TODO
        return array
		(
			'newsletter_final_id'   => 'newsletter_final_id',
            'published'             => 'published',
            'updated'               => 'updated',
            'enabled'               => 'enabled',
			'' => '',
		);
    }

    /**
     * 
     * @return array
     */
    public function getFieldsNewsletterTemplate ()
    {
        //TODO
        return array
		(
			'newsletter_template_id'    => 'newsletter_template_id',
            'published'                 => 'published',
            'updated'                   => 'updated',
            'enabled'                   => 'enabled',
			'' => '',
		);
    }

    /**
     * 
     * @return array
     */
    public function getFieldsNewsletterQueueReady ()
    {
        //TODO
        return array
		(
			'newsletter_queue_ready_id' => 'newsletter_queue_ready_id',
            'published'                 => 'published',
            'updated'                   => 'updated',
            'enabled'                   => 'enabled',
			'' => '',
		);
    }

    /**
     * 
     * @return array
     */
    public function getFieldsNewsletterQueueUnready ()
    {
        //TODO
        return array
		(
			'newsletter_queue_unready_id'   => 'newsletter_queue_unready_id',
            'published'                     => 'published',
            'updated'                       => 'updated',
            'enabled'                       => 'enabled',
			'' => '',
		);
    }

    /**
     * 
     * @return array
     */
    public function getFieldsProject ()
    {
        return array
		(
            'project_id'    => 'project_id',
            'published'     => 'published',
            'updated'       => 'updated',
            'enabled'       => 'enabled',
            'name'          => 'name',
            'title'         => 'title',
            'description'   => 'description',
		);
    }
	
    /**
     * 
     * @return array
     */
    public function getFieldsTextFinal ()
    {
        //TODO
        return array
		(
            'text_final_id' => 'text_final_id',
            'published'     => 'published',
            'updated'       => 'updated',
            'enabled'       => 'enabled',
			'' => '',
		);
    }

    /**
     * 
     * @return array
     */
    public function getFieldsTextTemplate ()
    {
        //TODO
        return array
		(
			'text_template_id'  => 'text_template_id',
            'published'         => 'published',
            'updated'           => 'updated',
            'enabled'           => 'enabled',
			'' => '',
		);
    }

    /**
     * 
     * @return array
     */
    public function getFieldsTopic ()
    {
        return array
		(
            'topic_id'      => 'topic_id',
            'published'     => 'published',
            'updated'       => 'updated',
            'enabled'       => 'enabled',
            //'project_id'  => 'project_id',
            'name'          => 'name',
            'title'         => 'title',
            'description'   => 'description',
		);
    }

    /**
     * 
     * @return array
     */
    public function getFieldsTopicToProject ()
    {
        return array
		(
            'topic_project_id'  => 'topic_project_id',
            'published'         => 'published',
            'updated'           => 'updated',
            'enabled'           => 'enabled',
            'topic_id'          => 'topic_id',
            'project_id'        => 'project_id',
		);
    }

    /**
     * 
     * @return array
     */
    public function getKeyFieldsAddressee ()
    {
        return array
		(
			'addressee_topic_id'    => 'addressee_topic_id',
		);
    }

    /**
     * 
     * @return array
     */
    public function getKeyFieldsAddresseeProperties ()
    {
        return array
		(
			'addressee_properties_id'   => 'addressee_properties_id',
		);
    }

    /**
     * 
     * @return array
     */
    public function getKeyFieldsAddresseeToProject ()
    {
        return array
		(
			'addressee_project_id'  => 'addressee_project_id',
		);
    }

    /**
     * 
     * @return array
     */
    public function getKeyFieldsAddresseeToTopic ()
    {
        return array
		(
			'addressee_topic_id'    => 'addressee_topic_id',
		);
    }

    /**
     * 
     * @return array
     */
    public function getKeyFieldsEmailTemplate ()
    {
        return array
		(
			'email_template_id' => 'email_template_id',
		);
    }

    /**
     * 
     * @return array
     */
    public function getKeyFieldsEmailTemplateCode ()
    {
        return array
		(
			'email_template_code_id'    => 'email_template_code_id',
		);
    }

    /**
     * 
     * @return array
     */
    public function getKeyFieldsNewsletterFinal ()
    {
        return array
		(
			'newsletter_final_id'   => 'newsletter_final_id',
		);
    }

    /**
     * 
     * @return array
     */
    public function getKeyFieldsNewsletterTemplate ()
    {
        return array
		(
			'newsletter_template_id'    => 'newsletter_template_id',
		);
    }

    /**
     * 
     * @return array
     */
    public function getKeyFieldsNewsletterQueueReady ()
    {
        return array
		(
			'newsletter_queue_ready_id' => 'newsletter_queue_ready_id',
		);
    }

    /**
     * 
     * @return array
     */
    public function getKeyFieldsNewsletterQueueUnready ()
    {
        return array
		(
			'newsletter_queue_unready_id'   => 'newsletter_queue_unready_id',
		);
    }

    /**
     * 
     * @return array
     */
    public function getKeyFieldsProject ()
    {
        return array
		(
			'project_id'    => 'project_id',
		);
    }
	
    /**
     * 
     * @return array
     */
    public function getKeyFieldsTextFinal ()
    {
        return array
		(
			'text_final_id' => 'text_final_id',
		);
    }

    /**
     * 
     * @return array
     */
    public function getKeyFieldsTextTemplate ()
    {
        return array
		(
			'text_template_id'  => 'text_template_id',
		);
    }

    /**
     * 
     * @return array
     */
    public function getKeyFieldsTopic ()
    {
        return array
		(
			'topic_id'  => 'topic_id',
		);
    }

    /**
     * 
     * @return array
     */
    public function getKeyFieldsTopicToProject ()
    {
        return array
		(
			'topic_project_id'  => 'topic_project_id',
		);
    }

	/**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return mixed
     */
    public function addAddressee ($params = array(), $returnAsString = false)
    {
        if (count($params) == 0)
        {
            return false;
        }
		
        if (! isset($params['published']) || $params['published'] == '0000-00-00 00:00:00' || $params['published'] == '')
        {
            $params['published'] = date('Y-m-d H:i:s', time());
        }
        if (! isset($params['updated']) || $params['updated'] == '0000-00-00 00:00:00' || $params['updated'] == '')
        {
            $params['updated'] = '0001-01-01 00:00:00';
        }
        if (! isset($params['enabled']))
        {
            $params['enabled'] = '1';
        }
        if (! isset($params['salutation']))
        {
            $params['salutation'] = '';
        }
        if (! isset($params['gender']))
        {
            $params['gender'] = '1';
        }
        if (! isset($params['name']))
        {
            $params['name'] = '';
        }
        if (! isset($params['firstname']))
        {
            $params['firstname'] = '';
        }
        if (! isset($params['secondname']))
        {
            $params['secondname'] = '';
        }
        if (! isset($params['email']))
        {
            $params['email'] = '';
        }
        if (! isset($params['registered']))
        {
            $params['registered'] = date('Y-m-d H:i:s', time());
        }
        if (! isset($params['registered_ip']))
        {
            $params['registered_ip'] = '';
        }
        if (! isset($params['confirmed']) || $params['confirmed'] == '0000-00-00 00:00:00' || $params['confirmed'] == '')
        {
            $params['confirmed'] = '0001-01-01 00:00:00';
        }
        if (! isset($params['confirmed_ip']))
        {
            $params['confirmed_ip'] = '';
        }
        if (! isset($params['unsubscribed']) || $params['unsubscribed'] == '0000-00-00 00:00:00' || $params['unsubscribed'] == '')
        {
            $params['unsubscribed'] = '0001-01-01 00:00:00';
        }
        if (! isset($params['unsubscribed_ip']))
        {
            $params['unsubscribed_ip'] = '';
        }
        if (! isset($params['banned']) || $params['banned'] == '0000-00-00 00:00:00' || $params['banned'] == '')
        {
            $params['banned'] = '0001-01-01 00:00:00';
        }
		
		$function = 'Addressee';
		
		return $this->_add($function, $params, $returnAsString);
    }

	/**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return mixed
     */
    public function addAddresseeProperties ($params = array(), $returnAsString = false)
    {
        if (count($params) == 0)
        {
            return false;
        }
		
        if (! isset($params['published']) || $params['published'] == '0000-00-00 00:00:00' || $params['published'] == '')
        {
            $params['published'] = date('Y-m-d H:i:s', time());
        }
        if (! isset($params['updated']) || $params['updated'] == '0000-00-00 00:00:00' || $params['updated'] == '')
        {
            $params['updated'] = '0001-01-01 00:00:00';
        }
        if (! isset($params['enabled']))
        {
            $params['enabled'] = '1';
        }
        if (! isset($params['addressee_id']))
        {
            $params['addressee_id'] = '0';
        }
        if (! isset($params['field_name']))
        {
            $params['field_name'] = '';
        }
        if (! isset($params['field_value']))
        {
            $params['field_value'] = '';
        }
		
		$function = 'AddresseeProperties';
		
		return $this->_add($function, $params, $returnAsString);
    }

	/**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return mixed
     */
    public function addAddresseeToProject ($params = array(), $returnAsString = false)
    {
        if (count($params) == 0)
        {
            return false;
        }
		
        if (! isset($params['published']) || $params['published'] == '0000-00-00 00:00:00' || $params['published'] == '')
        {
            $params['published'] = date('Y-m-d H:i:s', time());
        }
        if (! isset($params['updated']) || $params['updated'] == '0000-00-00 00:00:00' || $params['updated'] == '')
        {
            $params['updated'] = '0001-01-01 00:00:00';
        }
        if (! isset($params['enabled']))
        {
            $params['enabled'] = '1';
        }
        if (! isset($params['addressee_id']))
        {
            $params['addressee_id'] = '0';
        }
        if (! isset($params['project_id']))
        {
            $params['project_id'] = '0';
        }
		
		$function = 'AddresseeToProject';
		
		return $this->_add($function, $params, $returnAsString);
    }

	/**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return mixed
     */
    public function addAddresseeToTopic ($params = array(), $returnAsString = false)
    {
        if (count($params) == 0)
        {
            return false;
        }
		
        if (! isset($params['published']) || $params['published'] == '0000-00-00 00:00:00' || $params['published'] == '')
        {
            $params['published'] = date('Y-m-d H:i:s', time());
        }
        if (! isset($params['updated']) || $params['updated'] == '0000-00-00 00:00:00' || $params['updated'] == '')
        {
            $params['updated'] = '0001-01-01 00:00:00';
        }
        if (! isset($params['enabled']))
        {
            $params['enabled'] = '1';
        }
        if (! isset($params['addressee_id']))
        {
            $params['addressee_id'] = '0';
        }
        if (! isset($params['topic_id']))
        {
            $params['topic_id'] = '0';
        }
		
		$function = 'AddresseeToTopic';
		
		return $this->_add($function, $params, $returnAsString);
    }

	/**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return mixed
     */
    public function addEmailTemplate ($params = array(), $returnAsString = false)
    {
        if (count($params) == 0)
        {
            return false;
        }
		
        //TODO
        if (! isset($params['published']) || $params['published'] == '0000-00-00 00:00:00' || $params['published'] == '')
        {
            $params['published'] = date('Y-m-d H:i:s', time());
        }
        if (! isset($params['updated']) || $params['updated'] == '0000-00-00 00:00:00' || $params['updated'] == '')
        {
            $params['updated'] = '0001-01-01 00:00:00';
        }
        if (! isset($params['enabled']))
        {
            $params['enabled'] = '1';
        }
        if (! isset($params['']))
        {
            $params[''] = '';
        }
		
		$function = 'EmailTemplate';
		
		return $this->_add($function, $params, $returnAsString);
    }

	/**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return mixed
     */
    public function addEmailTemplateCode ($params = array(), $returnAsString = false)
    {
        if (count($params) == 0)
        {
            return false;
        }
		
        //TODO
        if (! isset($params['published']) || $params['published'] == '0000-00-00 00:00:00' || $params['published'] == '')
        {
            $params['published'] = date('Y-m-d H:i:s', time());
        }
        if (! isset($params['updated']) || $params['updated'] == '0000-00-00 00:00:00' || $params['updated'] == '')
        {
            $params['updated'] = '0001-01-01 00:00:00';
        }
        if (! isset($params['enabled']))
        {
            $params['enabled'] = '1';
        }
        if (! isset($params['']))
        {
            $params[''] = '';
        }
		
		$function = 'EmailTemplateCode';
		
		return $this->_add($function, $params, $returnAsString);
    }

	/**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return mixed
     */
    public function addNewsletterFinal ($params = array(), $returnAsString = false)
    {
        if (count($params) == 0)
        {
            return false;
        }
		
        //TODO
        if (! isset($params['published']) || $params['published'] == '0000-00-00 00:00:00' || $params['published'] == '')
        {
            $params['published'] = date('Y-m-d H:i:s', time());
        }
        if (! isset($params['updated']) || $params['updated'] == '0000-00-00 00:00:00' || $params['updated'] == '')
        {
            $params['updated'] = '0001-01-01 00:00:00';
        }
        if (! isset($params['enabled']))
        {
            $params['enabled'] = '1';
        }
        if (! isset($params['']))
        {
            $params[''] = '';
        }
		
		$function = 'NewsletterFinal';
		
		return $this->_add($function, $params, $returnAsString);
    }

	/**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return mixed
     */
    public function addNewsletterTemplate ($params = array(), $returnAsString = false)
    {
        if (count($params) == 0)
        {
            return false;
        }
		
        //TODO
        if (! isset($params['published']) || $params['published'] == '0000-00-00 00:00:00' || $params['published'] == '')
        {
            $params['published'] = date('Y-m-d H:i:s', time());
        }
        if (! isset($params['updated']) || $params['updated'] == '0000-00-00 00:00:00' || $params['updated'] == '')
        {
            $params['updated'] = '0001-01-01 00:00:00';
        }
        if (! isset($params['enabled']))
        {
            $params['enabled'] = '1';
        }
        if (! isset($params['']))
        {
            $params[''] = '';
        }
		
		$function = 'NewsletterTemplate';
		
		return $this->_add($function, $params, $returnAsString);
    }

	/**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return mixed
     */
    public function addNewsletterQueueReady ($params = array(), $returnAsString = false)
    {
        if (count($params) == 0)
        {
            return false;
        }
		
        //TODO
        if (! isset($params['published']) || $params['published'] == '0000-00-00 00:00:00' || $params['published'] == '')
        {
            $params['published'] = date('Y-m-d H:i:s', time());
        }
        if (! isset($params['updated']) || $params['updated'] == '0000-00-00 00:00:00' || $params['updated'] == '')
        {
            $params['updated'] = '0001-01-01 00:00:00';
        }
        if (! isset($params['enabled']))
        {
            $params['enabled'] = '1';
        }
        if (! isset($params['']))
        {
            $params[''] = '';
        }
		
		$function = 'NewsletterQueueReady';
		
		return $this->_add($function, $params, $returnAsString);
    }

	/**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return mixed
     */
    public function addNewsletterQueueUnready ($params = array(), $returnAsString = false)
    {
        if (count($params) == 0)
        {
            return false;
        }
		
        //TODO
        if (! isset($params['published']) || $params['published'] == '0000-00-00 00:00:00' || $params['published'] == '')
        {
            $params['published'] = date('Y-m-d H:i:s', time());
        }
        if (! isset($params['updated']) || $params['updated'] == '0000-00-00 00:00:00' || $params['updated'] == '')
        {
            $params['updated'] = '0001-01-01 00:00:00';
        }
        if (! isset($params['enabled']))
        {
            $params['enabled'] = '1';
        }
        if (! isset($params['']))
        {
            $params[''] = '';
        }
		
		$function = 'NewsletterQueueUnready';
		
		return $this->_add($function, $params, $returnAsString);
    }

	/**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return mixed
     */
    public function addProject ($params = array(), $returnAsString = false)
    {
        if (count($params) == 0)
        {
            return false;
        }
		
        if (! isset($params['published']) || $params['published'] == '0000-00-00 00:00:00' || $params['published'] == '')
        {
            $params['published'] = date('Y-m-d H:i:s', time());
        }
        if (! isset($params['updated']) || $params['updated'] == '0000-00-00 00:00:00' || $params['updated'] == '')
        {
            $params['updated'] = '0001-01-01 00:00:00';
        }
        if (! isset($params['enabled']))
        {
            $params['enabled'] = '1';
        }
        if (! isset($params['name']))
        {
            $params['name'] = '';
        }
        if (! isset($params['title']))
        {
            $params['title'] = '';
        }
        if (! isset($params['description']))
        {
            $params['description'] = '';
        }
		
		$function = 'Project';
		
		return $this->_add($function, $params, $returnAsString);
    }

	/**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return mixed
     */
    public function addTextFinal ($params = array(), $returnAsString = false)
    {
        if (count($params) == 0)
        {
            return false;
        }
		
        //TODO
        if (! isset($params['published']) || $params['published'] == '0000-00-00 00:00:00' || $params['published'] == '')
        {
            $params['published'] = date('Y-m-d H:i:s', time());
        }
        if (! isset($params['updated']) || $params['updated'] == '0000-00-00 00:00:00' || $params['updated'] == '')
        {
            $params['updated'] = '0001-01-01 00:00:00';
        }
        if (! isset($params['enabled']))
        {
            $params['enabled'] = '1';
        }
        if (! isset($params['']))
        {
            $params[''] = '';
        }
		
		$function = 'TextFinal';
		
		return $this->_add($function, $params, $returnAsString);
    }

	/**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return mixed
     */
    public function addTextTemplate ($params = array(), $returnAsString = false)
    {
        if (count($params) == 0)
        {
            return false;
        }
		
        //TODO
        if (! isset($params['published']) || $params['published'] == '0000-00-00 00:00:00' || $params['published'] == '')
        {
            $params['published'] = date('Y-m-d H:i:s', time());
        }
        if (! isset($params['updated']) || $params['updated'] == '0000-00-00 00:00:00' || $params['updated'] == '')
        {
            $params['updated'] = '0001-01-01 00:00:00';
        }
        if (! isset($params['enabled']))
        {
            $params['enabled'] = '1';
        }
        if (! isset($params['']))
        {
            $params[''] = '';
        }
		
		$function = 'TextTemplate';
		
		return $this->_add($function, $params, $returnAsString);
    }

	/**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return mixed
     */
    public function addTopic ($params = array(), $returnAsString = false)
    {
        if (count($params) == 0)
        {
            return false;
        }
		
        if (! isset($params['published']) || $params['published'] == '0000-00-00 00:00:00' || $params['published'] == '')
        {
            $params['published'] = date('Y-m-d H:i:s', time());
        }
        if (! isset($params['updated']) || $params['updated'] == '0000-00-00 00:00:00' || $params['updated'] == '')
        {
            $params['updated'] = '0001-01-01 00:00:00';
        }
        if (! isset($params['enabled']))
        {
            $params['enabled'] = '1';
        }
        if (! isset($params['name']))
        {
            $params['name'] = '';
        }
        if (! isset($params['title']))
        {
            $params['title'] = '';
        }
        if (! isset($params['description']))
        {
            $params['description'] = '';
        }
		
		$function = 'Topic';
		
		return $this->_add($function, $params, $returnAsString);
    }

	/**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return mixed
     */
    public function addTopicToProject ($params = array(), $returnAsString = false)
    {
        if (count($params) == 0)
        {
            return false;
        }
		
        if (! isset($params['published']) || $params['published'] == '0000-00-00 00:00:00' || $params['published'] == '')
        {
            $params['published'] = date('Y-m-d H:i:s', time());
        }
        if (! isset($params['updated']) || $params['updated'] == '0000-00-00 00:00:00' || $params['updated'] == '')
        {
            $params['updated'] = '0001-01-01 00:00:00';
        }
        if (! isset($params['enabled']))
        {
            $params['enabled'] = '1';
        }
        if (! isset($params['topic_id']))
        {
            $params['topic_id'] = '0';
        }
        if (! isset($params['project_id']))
        {
            $params['project_id'] = '0';
        }
		
		$function = 'TopicToProject';
		
		return $this->_add($function, $params, $returnAsString);
    }
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function deleteAddressee ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
		$function = 'Addressee';
		
		return $this->_delete($function, $params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function deleteAddresseeProperties ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
		$function = 'AddresseeProperties';
		
		return $this->_delete($function, $params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function deleteAddresseeToProject ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
		$function = 'AddresseeToProject';
		
		return $this->_delete($function, $params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function deleteAddresseeToTopic ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
		$function = 'AddresseeToTopic';
		
		return $this->_delete($function, $params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function deleteEmailTemplate ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
		$function = 'EmailTemplate';
		
		return $this->_delete($function, $params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function deleteEmailTemplateCode ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
		$function = 'EmailTemplateCode';
		
		return $this->_delete($function, $params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function deleteNewsletterFinal ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
		$function = 'NewsletterFinal';
		
		return $this->_delete($function, $params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function deleteNewsletterTemplate ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
		$function = 'NewsletterTemplate';
		
		return $this->_delete($function, $params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function deleteNewsletterQueueReady ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
		$function = 'NewsletterQueueReady';
		
		return $this->_delete($function, $params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function deleteNewsletterQueueUnready ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
		$function = 'NewsletterQueueUnready';
		
		return $this->_delete($function, $params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function deleteProject ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
		$function = 'Project';
		
		return $this->_delete($function, $params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function deleteTextFinal ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
		$function = 'TextFinal';
		
		return $this->_delete($function, $params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function deleteTextTemplate ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
		$function = 'TextTemplate';
		
		return $this->_delete($function, $params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function deleteTopic ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
		$function = 'Topic';
		
		return $this->_delete($function, $params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function deleteTopicToProject ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
		$function = 'TopicToProject';
		
		return $this->_delete($function, $params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function editAddressee ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        if (! isset($params['updated']) || $params['updated'] == '0000-00-00 00:00:00' || $params['updated'] == '0001-01-01 00:00:00' || $params['updated'] == '')
        {
            $params['updated'] = date('Y-m-d H:i:s', time());
        }
		
		$function = 'Addressee';
		
		return $this->_edit($function, $params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function editAddresseeProperties ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        if (! isset($params['updated']) || $params['updated'] == '0000-00-00 00:00:00' || $params['updated'] == '0001-01-01 00:00:00' || $params['updated'] == '')
        {
            $params['updated'] = date('Y-m-d H:i:s', time());
        }
		
		$function = 'AddresseeProperties';
		
		return $this->_edit($function, $params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function editAddresseeToProject ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        if (! isset($params['updated']) || $params['updated'] == '0000-00-00 00:00:00' || $params['updated'] == '0001-01-01 00:00:00' || $params['updated'] == '')
        {
            $params['updated'] = date('Y-m-d H:i:s', time());
        }
		
		$function = 'AddresseeToProject';
		
		return $this->_edit($function, $params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function editAddresseeToTopic ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        if (! isset($params['updated']) || $params['updated'] == '0000-00-00 00:00:00' || $params['updated'] == '0001-01-01 00:00:00' || $params['updated'] == '')
        {
            $params['updated'] = date('Y-m-d H:i:s', time());
        }
		
		$function = 'AddresseeToTopic';
		
		return $this->_edit($function, $params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function editEmailTemplate ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        if (! isset($params['updated']) || $params['updated'] == '0000-00-00 00:00:00' || $params['updated'] == '0001-01-01 00:00:00' || $params['updated'] == '')
        {
            $params['updated'] = date('Y-m-d H:i:s', time());
        }
		
		$function = 'EmailTemplate';
		
		return $this->_edit($function, $params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function editEmailTemplateCode ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        if (! isset($params['updated']) || $params['updated'] == '0000-00-00 00:00:00' || $params['updated'] == '0001-01-01 00:00:00' || $params['updated'] == '')
        {
            $params['updated'] = date('Y-m-d H:i:s', time());
        }
		
		$function = 'EmailTemplateCode';
		
		return $this->_edit($function, $params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function editNewsletterFinal ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        if (! isset($params['updated']) || $params['updated'] == '0000-00-00 00:00:00' || $params['updated'] == '0001-01-01 00:00:00' || $params['updated'] == '')
        {
            $params['updated'] = date('Y-m-d H:i:s', time());
        }
		
		$function = 'NewsletterFinal';
		
		return $this->_edit($function, $params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function editNewsletterTemplate ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        if (! isset($params['updated']) || $params['updated'] == '0000-00-00 00:00:00' || $params['updated'] == '0001-01-01 00:00:00' || $params['updated'] == '')
        {
            $params['updated'] = date('Y-m-d H:i:s', time());
        }
		
		$function = 'NewsletterTemplate';
		
		return $this->_edit($function, $params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function editNewsletterQueueReady ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        if (! isset($params['updated']) || $params['updated'] == '0000-00-00 00:00:00' || $params['updated'] == '0001-01-01 00:00:00' || $params['updated'] == '')
        {
            $params['updated'] = date('Y-m-d H:i:s', time());
        }
		
		$function = 'NewsletterQueueReady';
		
		return $this->_edit($function, $params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function editNewsletterQueueUnready ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        if (! isset($params['updated']) || $params['updated'] == '0000-00-00 00:00:00' || $params['updated'] == '0001-01-01 00:00:00' || $params['updated'] == '')
        {
            $params['updated'] = date('Y-m-d H:i:s', time());
        }
		
		$function = 'NewsletterQueueUnready';
		
		return $this->_edit($function, $params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function editProject ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        if (! isset($params['updated']) || $params['updated'] == '0000-00-00 00:00:00' || $params['updated'] == '0001-01-01 00:00:00' || $params['updated'] == '')
        {
            $params['updated'] = date('Y-m-d H:i:s', time());
        }
		
		$function = 'Project';
		
		return $this->_edit($function, $params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function editTextFinal ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        if (! isset($params['updated']) || $params['updated'] == '0000-00-00 00:00:00' || $params['updated'] == '0001-01-01 00:00:00' || $params['updated'] == '')
        {
            $params['updated'] = date('Y-m-d H:i:s', time());
        }
		
		$function = 'TextFinal';
		
		return $this->_edit($function, $params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function editTextTemplate ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        if (! isset($params['updated']) || $params['updated'] == '0000-00-00 00:00:00' || $params['updated'] == '0001-01-01 00:00:00' || $params['updated'] == '')
        {
            $params['updated'] = date('Y-m-d H:i:s', time());
        }
		
		$function = 'TextTemplate';
		
		return $this->_edit($function, $params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function editTopic ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        if (! isset($params['updated']) || $params['updated'] == '0000-00-00 00:00:00' || $params['updated'] == '0001-01-01 00:00:00' || $params['updated'] == '')
        {
            $params['updated'] = date('Y-m-d H:i:s', time());
        }
		
		$function = 'Topic';
		
		return $this->_edit($function, $params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function editTopicToProject ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        if (! isset($params['updated']) || $params['updated'] == '0000-00-00 00:00:00' || $params['updated'] == '0001-01-01 00:00:00' || $params['updated'] == '')
        {
            $params['updated'] = date('Y-m-d H:i:s', time());
        }
		
		$function = 'TopicToProject';
		
		return $this->_edit($function, $params, $returnAsString);
	}

    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
    public function getAddressee ($params = array(), $returnAsString = false)
    {
		$function = 'Addressee';
		
		return $this->_get($function, $params, $returnAsString);
    }

    /**
     *
     * @param array $where
     * @return array
     */
    public function getAddresseeList ($where = array())
    {
		$function = 'Addressee';
		
		return $this->_getList($function, $where);
    }

    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
    public function getAddresseeProperties ($params = array(), $returnAsString = false)
    {
		$function = 'AddresseeProperties';
		
		return $this->_get($function, $params, $returnAsString);
    }

    /**
     *
     * @param array $where
     * @return array
     */
    public function getAddresseePropertiesList ($where = array())
    {
		$function = 'AddresseeProperties';
		
		return $this->_getList($function, $where);
    }

    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
    public function getAddresseeToProject ($params = array(), $returnAsString = false)
    {
		$function = 'AddresseeToProject';
		
		return $this->_get($function, $params, $returnAsString);
    }

    /**
     *
     * @param array $where
     * @return array
     */
    public function getAddresseeToProjectList ($where = array())
    {
		$function = 'AddresseeToProject';
		
		return $this->_getList($function, $where);
    }

    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
    public function getAddresseeToTopic ($params = array(), $returnAsString = false)
    {
		$function = 'AddresseeToTopic';
		
		return $this->_get($function, $params, $returnAsString);
    }

    /**
     *
     * @param array $where
     * @return array
     */
    public function getAddresseeToTopicList ($where = array())
    {
		$function = 'AddresseeToTopic';
		
		return $this->_getList($function, $where);
    }

    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
    public function getEmailTemplate ($params = array(), $returnAsString = false)
    {
		$function = 'EmailTemplate';
		
		return $this->_get($function, $params, $returnAsString);
    }

    /**
     *
     * @param array $where
     * @return array
     */
    public function getEmailTemplateList ($where = array())
    {
		$function = 'EmailTemplate';
		
		return $this->_getList($function, $where);
    }

    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
    public function getEmailTemplateCode ($params = array(), $returnAsString = false)
    {
		$function = 'EmailTemplateCode';
		
		return $this->_get($function, $params, $returnAsString);
    }

    /**
     *
     * @param array $where
     * @return array
     */
    public function getEmailTemplateCodeList ($where = array())
    {
		$function = 'EmailTemplateCode';
		
		return $this->_getList($function, $where);
    }

    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
    public function getNewsletterFinal ($params = array(), $returnAsString = false)
    {
		$function = 'NewsletterFinal';
		
		return $this->_get($function, $params, $returnAsString);
    }

    /**
     *
     * @param array $where
     * @return array
     */
    public function getNewsletterFinalList ($where = array())
    {
		$function = 'NewsletterFinal';
		
		return $this->_getList($function, $where);
    }

    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
    public function getNewsletterTemplate ($params = array(), $returnAsString = false)
    {
		$function = 'NewsletterTemplate';
		
		return $this->_get($function, $params, $returnAsString);
    }

    /**
     *
     * @param array $where
     * @return array
     */
    public function getNewsletterTemplateList ($where = array())
    {
		$function = 'NewsletterTemplate';
		
		return $this->_getList($function, $where);
    }

    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
    public function getNewsletterQueueReady ($params = array(), $returnAsString = false)
    {
		$function = 'NewsletterQueueReady';
		
		return $this->_get($function, $params, $returnAsString);
    }

    /**
     *
     * @param array $where
     * @return array
     */
    public function getNewsletterQueueReadyList ($where = array())
    {
		$function = 'NewsletterQueueReady';
		
		return $this->_getList($function, $where);
    }

    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
    public function getNewsletterQueueUnready ($params = array(), $returnAsString = false)
    {
		$function = 'NewsletterQueueUnready';
		
		return $this->_get($function, $params, $returnAsString);
    }

    /**
     *
     * @param array $where
     * @return array
     */
    public function getNewsletterQueueUnreadyList ($where = array())
    {
		$function = 'NewsletterQueueUnready';
		
		return $this->_getList($function, $where);
    }

    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
    public function getProject ($params = array(), $returnAsString = false)
    {
		$function = 'Project';
		
		return $this->_get($function, $params, $returnAsString);
    }

    /**
     *
     * @param array $where
     * @return array
     */
    public function getProjectList ($where = array())
    {
		$function = 'Project';
		
		return $this->_getList($function, $where);
    }

    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
    public function getTextFinal ($params = array(), $returnAsString = false)
    {
		$function = 'TextFinal';
		
		return $this->_get($function, $params, $returnAsString);
    }

    /**
     *
     * @param array $where
     * @return array
     */
    public function getTextFinalList ($where = array())
    {
		$function = 'TextFinal';
		
		return $this->_getList($function, $where);
    }

    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
    public function getTextTemplate ($params = array(), $returnAsString = false)
    {
		$function = 'TextTemplate';
		
		return $this->_get($function, $params, $returnAsString);
    }

    /**
     *
     * @param array $where
     * @return array
     */
    public function getTextTemplateList ($where = array())
    {
		$function = 'TextTemplate';
		
		return $this->_getList($function, $where);
    }

    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
    public function getTopic ($params = array(), $returnAsString = false)
    {
		$function = 'Topic';
		
		return $this->_get($function, $params, $returnAsString);
    }

    /**
     *
     * @param array $where
     * @return array
     */
    public function getTopicList ($where = array())
    {
		$function = 'Topic';
		
		return $this->_getList($function, $where);
    }

    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
    public function getTopicToProject ($params = array(), $returnAsString = false)
    {
		$function = 'TopicToProject';
		
		return $this->_get($function, $params, $returnAsString);
    }

    /**
     *
     * @param array $where
     * @return array
     */
    public function getTopicToProjectList ($where = array())
    {
		$function = 'TopicToProject';
		
		return $this->_getList($function, $where);
    }
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function disableAddressee ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        $params['enabled'] = '0';
		
		return $this->editAddressee($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function disableAddresseeProperties ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        $params['enabled'] = '0';
		
		return $this->editAddresseeProperties($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function disableAddresseeToProject ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        $params['enabled'] = '0';
		
		return $this->editAddresseeToProject($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function disableAddresseeToTopic ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        $params['enabled'] = '0';
		
		return $this->editAddresseeToTopic($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function disableEmailTemplate ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        $params['enabled'] = '0';
		
		return $this->editEmailTemplate($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function disableEmailTemplateCode ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        $params['enabled'] = '0';
		
		return $this->editEmailTemplateCode($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function disableNewsletterFinal ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        $params['enabled'] = '0';
		
		return $this->editNewsletterFinal($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function disableNewsletterTemplate ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        $params['enabled'] = '0';
		
		return $this->editNewsletterTemplate($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function disableNewsletterQueueReady ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        $params['enabled'] = '0';
		
		return $this->editNewsletterQueueReady($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function disableNewsletterQueueUnready ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        $params['enabled'] = '0';
		
		return $this->editNewsletterQueueUnready($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function disableProject ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        $params['enabled'] = '0';
		
		return $this->editProject($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function disableTextFinal ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        $params['enabled'] = '0';
		
		return $this->editTextFinal($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function disableTextTemplate ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        $params['enabled'] = '0';
		
		return $this->editTextTemplate($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function disableTopic ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        $params['enabled'] = '0';
		
		return $this->editTopic($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function disableTopicToProject ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        $params['enabled'] = '0';
		
		return $this->editTopicToProject($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function enableAddressee ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        $params['enabled'] = '1';
		
		return $this->editAddressee($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function enableAddresseeProperties ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        $params['enabled'] = '1';
		
		return $this->editAddresseeProperties($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function enableAddresseeToProject ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        $params['enabled'] = '1';
		
		return $this->editAddresseeToProject($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function enableAddresseeToTopic ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        $params['enabled'] = '1';
		
		return $this->editAddresseeToTopic($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function enableEmailTemplate ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        $params['enabled'] = '1';
		
		return $this->editEmailTemplate($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function enableEmailTemplateCode ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        $params['enabled'] = '1';
		
		return $this->editEmailTemplateCode($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function enableNewsletterFinal ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        $params['enabled'] = '1';
		
		return $this->editNewsletterFinal($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function enableNewsletterTemplate ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        $params['enabled'] = '1';
		
		return $this->editNewsletterTemplate($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function enableNewsletterQueueReady ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        $params['enabled'] = '1';
		
		return $this->editNewsletterQueueReady($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function enableNewsletterQueueUnready ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        $params['enabled'] = '1';
		
		return $this->editNewsletterQueueUnready($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function enableProject ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        $params['enabled'] = '1';
		
		return $this->editProject($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function enableTextFinal ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        $params['enabled'] = '1';
		
		return $this->editTextFinal($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function enableTextTemplate ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        $params['enabled'] = '1';
		
		return $this->editTextTemplate($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function enableTopic ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        $params['enabled'] = '1';
		
		return $this->editTopic($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function enableTopicToProject ($params = array(), $returnAsString = false)
	{
        if (count($params) == 0)
        {
            return false;
        }
		
        $params['enabled'] = '1';
		
		return $this->editTopicToProject($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function softDeleteAddressee ($params = array(), $returnAsString = false)
	{
		return $this->disableAddressee($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function softDeleteAddresseeProperties ($params = array(), $returnAsString = false)
	{
		return $this->disableAddresseeProperties($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function softDeleteAddresseeToProject ($params = array(), $returnAsString = false)
	{
		return $this->disableAddresseeToProject($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function softDeleteAddresseeToTopic ($params = array(), $returnAsString = false)
	{
		return $this->disableAddresseeToTopic($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function softDeleteEmailTemplate ($params = array(), $returnAsString = false)
	{
		return $this->disableEmailTemplate($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function softDeleteEmailTemplateCode ($params = array(), $returnAsString = false)
	{
		return $this->disableEmailTemplateCode($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function softDeleteNewsletterFinal ($params = array(), $returnAsString = false)
	{
		return $this->disableNewsletterFinal($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function softDeleteNewsletterTemplate ($params = array(), $returnAsString = false)
	{
		return $this->disableNewsletterTemplate($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function softDeleteNewsletterQueueReady ($params = array(), $returnAsString = false)
	{
		return $this->disableNewsletterQueueReady($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function softDeleteNewsletterQueueUnready ($params = array(), $returnAsString = false)
	{
		return $this->disableNewsletterQueueUnready($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function softDeleteProject ($params = array(), $returnAsString = false)
	{
		return $this->disableProject($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function softDeleteTextFinal ($params = array(), $returnAsString = false)
	{
		return $this->disableTextFinal($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function softDeleteTextTemplate ($params = array(), $returnAsString = false)
	{
		return $this->disableTextTemplate($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function softDeleteTopic ($params = array(), $returnAsString = false)
	{
		return $this->disableTopic($params, $returnAsString);
	}
	
    /**
     *
     * @param array $params
     * @param boolean $returnAsString
     * @return string
     */
	public function softDeleteTopicToProject ($params = array(), $returnAsString = false)
	{
		return $this->disableTopicToProject($params, $returnAsString);
	}
    
}