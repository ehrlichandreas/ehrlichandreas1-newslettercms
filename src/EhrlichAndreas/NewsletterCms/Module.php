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
    
}