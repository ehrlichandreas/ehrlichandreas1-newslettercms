<?php 

/**
 *
 * @author Ehrlich, Andreas <ehrlich.andreas@googlemail.com>
 */
class EhrlichAndreas_NewsletterCms_Adapter_Pdo_Mysql extends EhrlichAndreas_AbstractCms_Adapter_Pdo_Mysql
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
     *
     * @var string 
     */
    protected $tableVersion = 'newsletter_version';
    
    /**
     * 
     * @return EhrlichAndreas_NewsletterCms_Adapter_Pdo_Mysql
     */
    public function install ()
    {
        $this->_install_version_10000();
        
        return $this;
    }
    
    /**
     * 
     * @return EhrlichAndreas_NewsletterCms_Adapter_Pdo_Mysql
     */
    protected function _install_version_10000 ()
    {
        $version = '10000';
        
        $dbAdapter = $this->getConnection();
        
        $tableVersion = $this->getTableName($this->tableVersion);
        
        $versionDb = $this->_getVersion($dbAdapter, $tableVersion);
        
        if ($versionDb >= $version)
        {
            return $this;
        }
		
        $tableAddressee = $this->getTableName($this->tableAddressee);
        
        $tableAddresseeProperties = $this->getTableName($this->tableAddresseeProperties);
        
        $tableAddresseeToProject = $this->getTableName($this->tableAddresseeToProject);
        
        $tableAddresseeToTopic = $this->getTableName($this->tableAddresseeToTopic);
		
        $tableEmailTemplate = $this->getTableName($this->tableEmailTemplate);
        
        $tableNewsletterFinal = $this->getTableName($this->tableNewsletterFinal);
        
        $tableNewsletterTemplate = $this->getTableName($this->tableNewsletterTemplate);
        
        $tableNewsletterQueueReady = $this->getTableName($this->tableNewsletterQueueReady);
        
        $tableNewsletterQueueUnready = $this->getTableName($this->tableNewsletterQueueUnready);
        
        $tableProject = $this->getTableName($this->tableProject);
        
        $tableTextFinal = $this->getTableName($this->tableTextFinal);
        
        $tableTextTemplate = $this->getTableName($this->tableTextTemplate);
        
        $tableTopic = $this->getTableName($this->tableTopic);
		
        $tableTopicToProject = $this->getTableName($this->tableTopicToProject);
		
        
        $queries = array();
        
        
        $query = array();

        $query[] = 'CREATE TABLE IF NOT EXISTS `%table%` ';
        $query[] = '( ';
        $query[] = '`num` BIGINT(19) NOT NULL AUTO_INCREMENT, ';
        $query[] = '`count` BIGINT(19) NOT NULL DEFAULT \'0\', ';
        $query[] = 'PRIMARY KEY (`num`) ';
        $query[] = ') ';
        $query[] = 'ENGINE = InnoDB ';
        $query[] = 'DEFAULT CHARACTER SET = utf8 ';
        $query[] = 'COLLATE = utf8_unicode_ci ';
        $query[] = 'AUTO_INCREMENT = 1; ';
		
		$queries[] = str_replace('%table%', $tableVersion, implode("\n", $query));
        
        
        $query = array();

        $query[] = 'CREATE TABLE IF NOT EXISTS `%table%` ';
        $query[] = '( ';
        $query[] = '`addressee_id` BIGINT(19) unsigned NOT NULL AUTO_INCREMENT, ';
        $query[] = '`published` DATETIME NOT NULL DEFAULT \'0001-01-01 00:00:00\', ';
        $query[] = '`updated` DATETIME NOT NULL DEFAULT \'0001-01-01 00:00:00\', ';
        $query[] = '`enabled` INT(5) NOT NULL DEFAULT \'0\', ';
        $query[] = '`salutation` VARCHAR(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT \'\', ';
        $query[] = '`gender` INT(5) NOT NULL DEFAULT \'1\', ';
        $query[] = '`name` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT \'\', ';
        $query[] = '`firstname` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT \'\', ';
        $query[] = '`secondname` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT \'\', ';
        $query[] = '`email` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT \'\', ';
        $query[] = '`registered` DATETIME NOT NULL DEFAULT \'0001-01-01 00:00:00\', ';
        $query[] = '`registered_ip` VARCHAR(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT \'\', ';
        $query[] = '`confirmed` DATETIME NOT NULL DEFAULT \'0001-01-01 00:00:00\', ';
        $query[] = '`confirmed_ip` VARCHAR(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT \'\', ';
        $query[] = '`banned` DATETIME NOT NULL DEFAULT \'0001-01-01 00:00:00\', ';
        $query[] = '`unsubscribed` DATETIME NOT NULL DEFAULT \'0001-01-01 00:00:00\', ';
        $query[] = '`unsubscribed_ip` VARCHAR(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT \'\', ';
        $query[] = 'PRIMARY KEY (`addressee_id`), ';
        $query[] = 'KEY `idx_email` (`email` (255)), ';
        $query[] = 'KEY `idx_name` (`name` (255)), ';
        $query[] = 'KEY `idx_registered_ip` (`registered_ip` (45)) ';
        $query[] = ') ';
        $query[] = 'ENGINE = InnoDB ';
        $query[] = 'DEFAULT CHARACTER SET = utf8 ';
        $query[] = 'COLLATE = utf8_unicode_ci ';
        $query[] = 'AUTO_INCREMENT = 1; ';
		
		$queries[] = str_replace('%table%', $tableAddressee, implode("\n", $query));

        
        $query = array();

        $query[] = 'CREATE TABLE IF NOT EXISTS `%table%` ';
        $query[] = '( ';
        $query[] = '`addressee_properties_id` BIGINT(19) unsigned NOT NULL AUTO_INCREMENT, ';
        $query[] = '`published` DATETIME NOT NULL DEFAULT \'0001-01-01 00:00:00\', ';
        $query[] = '`updated` DATETIME NOT NULL DEFAULT \'0001-01-01 00:00:00\', ';
        $query[] = '`enabled` INT(5) NOT NULL DEFAULT \'0\', ';
        $query[] = '`addressee_id` BIGINT(19) NOT NULL DEFAULT \'0\', ';
        $query[] = '`field_name` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT \'\', ';
        $query[] = '`field_value` TEXT COLLATE utf8_unicode_ci NOT NULL, ';
        $query[] = 'PRIMARY KEY (`addressee_properties_id`), ';
        $query[] = 'KEY `idx_addressee_id_field_name` (`addressee_id`, `field_name`), ';
        $query[] = 'KEY `idx_field_name_addressee_id` (`field_name`, `addressee_id`), ';
        $query[] = 'KEY `idx_field_name_field_value_addressee_id` (`field_name` (45), `field_value` (255), `addressee_id`), ';
        $query[] = 'KEY `idx_field_value_addressee_id` (`field_value` (255), `addressee_id`) ';
        $query[] = ') ';
        $query[] = 'ENGINE = InnoDB ';
        $query[] = 'DEFAULT CHARACTER SET = utf8 ';
        $query[] = 'COLLATE = utf8_unicode_ci ';
        $query[] = 'AUTO_INCREMENT = 1; ';
		
		$queries[] = str_replace('%table%', $tableAddresseeProperties, implode("\n", $query));

        
        $query = array();

        $query[] = 'CREATE TABLE IF NOT EXISTS `%table%` ';
        $query[] = '( ';
        $query[] = '`addressee_project_id` BIGINT(19) unsigned NOT NULL AUTO_INCREMENT, ';
        $query[] = '`published` DATETIME NOT NULL DEFAULT \'0001-01-01 00:00:00\', ';
        $query[] = '`updated` DATETIME NOT NULL DEFAULT \'0001-01-01 00:00:00\', ';
        $query[] = '`enabled` INT(5) NOT NULL DEFAULT \'0\', ';
        $query[] = '`addressee_id` BIGINT(19) NOT NULL DEFAULT \'0\', ';
        $query[] = '`project_id` BIGINT(19) NOT NULL DEFAULT \'0\', ';
        $query[] = 'PRIMARY KEY (`addressee_project_id`), ';
        $query[] = 'KEY `idx_addressee_id_project_id` (`addressee_id`, `project_id`), ';
        $query[] = 'KEY `idx_project_id_addressee_id` (`project_id`, `addressee_id`) ';
        $query[] = ') ';
        $query[] = 'ENGINE = InnoDB ';
        $query[] = 'DEFAULT CHARACTER SET = utf8 ';
        $query[] = 'COLLATE = utf8_unicode_ci ';
        $query[] = 'AUTO_INCREMENT = 1; ';
		
		$queries[] = str_replace('%table%', $tableAddresseeToProject, implode("\n", $query));

        
        $query = array();

        $query[] = 'CREATE TABLE IF NOT EXISTS `%table%` ';
        $query[] = '( ';
        $query[] = '`addressee_topic_id` BIGINT(19) unsigned NOT NULL AUTO_INCREMENT, ';
        $query[] = '`published` DATETIME NOT NULL DEFAULT \'0001-01-01 00:00:00\', ';
        $query[] = '`updated` DATETIME NOT NULL DEFAULT \'0001-01-01 00:00:00\', ';
        $query[] = '`enabled` INT(5) NOT NULL DEFAULT \'0\', ';
        $query[] = '`addressee_id` BIGINT(19) NOT NULL DEFAULT \'0\', ';
        $query[] = '`topic_id` BIGINT(19) NOT NULL DEFAULT \'0\', ';
        $query[] = 'PRIMARY KEY (`addressee_topic_id`), ';
        $query[] = 'KEY `idx_addressee_id_topic_id` (`addressee_id`, `topic_id`), ';
        $query[] = 'KEY `idx_topic_id_addressee_id` (`topic_id`, `addressee_id`) ';
        $query[] = ') ';
        $query[] = 'ENGINE = InnoDB ';
        $query[] = 'DEFAULT CHARACTER SET = utf8 ';
        $query[] = 'COLLATE = utf8_unicode_ci ';
        $query[] = 'AUTO_INCREMENT = 1; ';
		
		$queries[] = str_replace('%table%', $tableAddresseeToTopic, implode("\n", $query));

        
        $query = array();

        $query[] = 'CREATE TABLE IF NOT EXISTS `%table%` ';
        $query[] = '( ';
        $query[] = '`email_template_id` BIGINT(19) unsigned NOT NULL AUTO_INCREMENT, ';
        $query[] = '`published` DATETIME NOT NULL DEFAULT \'0001-01-01 00:00:00\', ';
        $query[] = '`updated` DATETIME NOT NULL DEFAULT \'0001-01-01 00:00:00\', ';
        $query[] = '`enabled` INT(5) NOT NULL DEFAULT \'0\', ';
        $query[] = '`name` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT \'\', ';
        $query[] = '`title` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT \'\', ';
        $query[] = '`description` TEXT COLLATE utf8_unicode_ci NOT NULL, ';
        $query[] = '`content` TEXT COLLATE utf8_unicode_ci NOT NULL, ';
        $query[] = 'PRIMARY KEY (`email_template_id`), ';
        $query[] = 'KEY `idx_name_title` (`name`, `title`), ';
        $query[] = 'KEY `idx_title_name` (`title`, `name`) ';
        $query[] = ') ';
        $query[] = 'ENGINE = InnoDB ';
        $query[] = 'DEFAULT CHARACTER SET = utf8 ';
        $query[] = 'COLLATE = utf8_unicode_ci ';
        $query[] = 'AUTO_INCREMENT = 1; ';
		
		$queries[] = str_replace('%table%', $tableEmailTemplate, implode("\n", $query));

        
        $query = array();

        $query[] = 'CREATE TABLE IF NOT EXISTS `%table%` ';
        $query[] = '( ';
        $query[] = '`newsletter_final_id` BIGINT(19) unsigned NOT NULL AUTO_INCREMENT, ';
        $query[] = '`published` DATETIME NOT NULL DEFAULT \'0001-01-01 00:00:00\', ';
        $query[] = '`updated` DATETIME NOT NULL DEFAULT \'0001-01-01 00:00:00\', ';
        $query[] = '`enabled` INT(5) NOT NULL DEFAULT \'0\', ';
        $query[] = '`newsletter_template_id` BIGINT(19) NOT NULL DEFAULT \'0\', ';
        $query[] = '`name` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT \'\', ';
        $query[] = '`title` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT \'\', ';
        $query[] = '`description` TEXT COLLATE utf8_unicode_ci NOT NULL, ';
        $query[] = '`content` TEXT COLLATE utf8_unicode_ci NOT NULL, ';
        $query[] = 'PRIMARY KEY (`newsletter_final_id`), ';
        $query[] = 'KEY `idx_newsletter_template_id` (`newsletter_template_id`), ';
        $query[] = 'KEY `idx_name_title` (`name`, `title`), ';
        $query[] = 'KEY `idx_title_name` (`title`, `name`) ';
        $query[] = ') ';
        $query[] = 'ENGINE = InnoDB ';
        $query[] = 'DEFAULT CHARACTER SET = utf8 ';
        $query[] = 'COLLATE = utf8_unicode_ci ';
        $query[] = 'AUTO_INCREMENT = 1; ';
		
		$queries[] = str_replace('%table%', $tableNewsletterFinal, implode("\n", $query));

        
        $query = array();

        $query[] = 'CREATE TABLE IF NOT EXISTS `%table%` ';
        $query[] = '( ';
        $query[] = '`newsletter_template_id` BIGINT(19) unsigned NOT NULL AUTO_INCREMENT, ';
        $query[] = '`published` DATETIME NOT NULL DEFAULT \'0001-01-01 00:00:00\', ';
        $query[] = '`updated` DATETIME NOT NULL DEFAULT \'0001-01-01 00:00:00\', ';
        $query[] = '`enabled` INT(5) NOT NULL DEFAULT \'0\', ';
        $query[] = '`name` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT \'\', ';
        $query[] = '`title` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT \'\', ';
        $query[] = '`description` TEXT COLLATE utf8_unicode_ci NOT NULL, ';
        $query[] = '`content` TEXT COLLATE utf8_unicode_ci NOT NULL, ';
        $query[] = 'PRIMARY KEY (`newsletter_template_id`), ';
        $query[] = 'KEY `idx_name_title` (`name`, `title`), ';
        $query[] = 'KEY `idx_title_name` (`title`, `name`) ';
        $query[] = ') ';
        $query[] = 'ENGINE = InnoDB ';
        $query[] = 'DEFAULT CHARACTER SET = utf8 ';
        $query[] = 'COLLATE = utf8_unicode_ci ';
        $query[] = 'AUTO_INCREMENT = 1; ';
		
		$queries[] = str_replace('%table%', $tableNewsletterTemplate, implode("\n", $query));

        
        $query = array();

        $query[] = 'CREATE TABLE IF NOT EXISTS `%table%` ';
        $query[] = '( ';
        $query[] = '`newsletter_queue_ready_id` BIGINT(19) unsigned NOT NULL AUTO_INCREMENT, ';
        $query[] = '`published` DATETIME NOT NULL DEFAULT \'0001-01-01 00:00:00\', ';
        $query[] = '`updated` DATETIME NOT NULL DEFAULT \'0001-01-01 00:00:00\', ';
        $query[] = '`enabled` INT(5) NOT NULL DEFAULT \'0\', ';
        $query[] = '`newsletter_final_id` BIGINT(19) NOT NULL DEFAULT \'0\', ';
        $query[] = '`addressee_id` BIGINT(19) NOT NULL DEFAULT \'0\', ';
        $query[] = 'PRIMARY KEY (`newsletter_queue_ready_id`), ';
        $query[] = 'KEY `newsletter_final_id` (`newsletter_final_id`), ';
        $query[] = 'KEY `addressee_id` (`addressee_id`) ';
        $query[] = ') ';
        $query[] = 'ENGINE = InnoDB ';
        $query[] = 'DEFAULT CHARACTER SET = utf8 ';
        $query[] = 'COLLATE = utf8_unicode_ci ';
        $query[] = 'AUTO_INCREMENT = 1; ';
		
		$queries[] = str_replace('%table%', $tableNewsletterQueueReady, implode("\n", $query));

        
        $query = array();

        $query[] = 'CREATE TABLE IF NOT EXISTS `%table%` ';
        $query[] = '( ';
        $query[] = '`newsletter_queue_unready_id` BIGINT(19) unsigned NOT NULL AUTO_INCREMENT, ';
        $query[] = '`published` DATETIME NOT NULL DEFAULT \'0001-01-01 00:00:00\', ';
        $query[] = '`updated` DATETIME NOT NULL DEFAULT \'0001-01-01 00:00:00\', ';
        $query[] = '`enabled` INT(5) NOT NULL DEFAULT \'0\', ';
        $query[] = '`newsletter_final_id` BIGINT(19) NOT NULL DEFAULT \'0\', ';
        $query[] = '`addressee_id` BIGINT(19) NOT NULL DEFAULT \'0\', ';
        $query[] = 'PRIMARY KEY (`newsletter_queue_unready_id`), ';
        $query[] = 'KEY `newsletter_final_id` (`newsletter_final_id`), ';
        $query[] = 'KEY `addressee_id` (`addressee_id`) ';
        $query[] = ') ';
        $query[] = 'ENGINE = InnoDB ';
        $query[] = 'DEFAULT CHARACTER SET = utf8 ';
        $query[] = 'COLLATE = utf8_unicode_ci ';
        $query[] = 'AUTO_INCREMENT = 1; ';
		
		$queries[] = str_replace('%table%', $tableNewsletterQueueUnready, implode("\n", $query));

        
        $query = array();

        $query[] = 'CREATE TABLE IF NOT EXISTS `%table%` ';
        $query[] = '( ';
        $query[] = '`project_id` BIGINT(19) unsigned NOT NULL AUTO_INCREMENT, ';
        $query[] = '`published` DATETIME NOT NULL DEFAULT \'0001-01-01 00:00:00\', ';
        $query[] = '`updated` DATETIME NOT NULL DEFAULT \'0001-01-01 00:00:00\', ';
        $query[] = '`enabled` INT(5) NOT NULL DEFAULT \'0\', ';
        $query[] = '`name` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT \'\', ';
        $query[] = '`title` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT \'\', ';
        $query[] = '`description` TEXT COLLATE utf8_unicode_ci NOT NULL, ';
        $query[] = 'PRIMARY KEY (`project_id`), ';
        $query[] = 'KEY `idx_name_title` (`name`, `title`), ';
        $query[] = 'KEY `idx_title_name` (`title`, `name`) ';
        $query[] = ') ';
        $query[] = 'ENGINE = InnoDB ';
        $query[] = 'DEFAULT CHARACTER SET = utf8 ';
        $query[] = 'COLLATE = utf8_unicode_ci ';
        $query[] = 'AUTO_INCREMENT = 1; ';
		
		$queries[] = str_replace('%table%', $tableProject, implode("\n", $query));

        
        $query = array();

        $query[] = 'CREATE TABLE IF NOT EXISTS `%table%` ';
        $query[] = '( ';
        $query[] = '`text_final_id` BIGINT(19) unsigned NOT NULL AUTO_INCREMENT, ';
        $query[] = '`published` DATETIME NOT NULL DEFAULT \'0001-01-01 00:00:00\', ';
        $query[] = '`updated` DATETIME NOT NULL DEFAULT \'0001-01-01 00:00:00\', ';
        $query[] = '`enabled` INT(5) NOT NULL DEFAULT \'0\', ';
        $query[] = '`text_template_id` BIGINT(19) NOT NULL DEFAULT \'0\', ';
        $query[] = '`name` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT \'\', ';
        $query[] = '`title` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT \'\', ';
        $query[] = '`description` TEXT COLLATE utf8_unicode_ci NOT NULL, ';
        $query[] = '`content` TEXT COLLATE utf8_unicode_ci NOT NULL, ';
        $query[] = 'PRIMARY KEY (`text_final_id`), ';
        $query[] = 'KEY `idx_text_template_id` (`text_template_id`), ';
        $query[] = 'KEY `idx_name_title` (`name`, `title`), ';
        $query[] = 'KEY `idx_title_name` (`title`, `name`) ';
        $query[] = ') ';
        $query[] = 'ENGINE = InnoDB ';
        $query[] = 'DEFAULT CHARACTER SET = utf8 ';
        $query[] = 'COLLATE = utf8_unicode_ci ';
        $query[] = 'AUTO_INCREMENT = 1; ';
		
		$queries[] = str_replace('%table%', $tableTextFinal, implode("\n", $query));

        
        $query = array();

        $query[] = 'CREATE TABLE IF NOT EXISTS `%table%` ';
        $query[] = '( ';
        $query[] = '`text_template_id` BIGINT(19) unsigned NOT NULL AUTO_INCREMENT, ';
        $query[] = '`published` DATETIME NOT NULL DEFAULT \'0001-01-01 00:00:00\', ';
        $query[] = '`updated` DATETIME NOT NULL DEFAULT \'0001-01-01 00:00:00\', ';
        $query[] = '`enabled` INT(5) NOT NULL DEFAULT \'0\', ';
        $query[] = '`name` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT \'\', ';
        $query[] = '`title` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT \'\', ';
        $query[] = '`description` TEXT COLLATE utf8_unicode_ci NOT NULL, ';
        $query[] = '`content` TEXT COLLATE utf8_unicode_ci NOT NULL, ';
        $query[] = 'PRIMARY KEY (`text_template_id`), ';
        $query[] = 'KEY `idx_name_title` (`name`, `title`), ';
        $query[] = 'KEY `idx_title_name` (`title`, `name`) ';
        $query[] = ') ';
        $query[] = 'ENGINE = InnoDB ';
        $query[] = 'DEFAULT CHARACTER SET = utf8 ';
        $query[] = 'COLLATE = utf8_unicode_ci ';
        $query[] = 'AUTO_INCREMENT = 1; ';
		
		$queries[] = str_replace('%table%', $tableTextTemplate, implode("\n", $query));

        
        $query = array();

        $query[] = 'CREATE TABLE IF NOT EXISTS `%table%` ';
        $query[] = '( ';
        $query[] = '`topic_project_id` BIGINT(19) unsigned NOT NULL AUTO_INCREMENT, ';
        $query[] = '`published` DATETIME NOT NULL DEFAULT \'0001-01-01 00:00:00\', ';
        $query[] = '`updated` DATETIME NOT NULL DEFAULT \'0001-01-01 00:00:00\', ';
        $query[] = '`enabled` INT(5) NOT NULL DEFAULT \'0\', ';
        $query[] = '`topic_id` BIGINT(19) NOT NULL DEFAULT \'0\', ';
        $query[] = '`project_id` BIGINT(19) NOT NULL DEFAULT \'0\', ';
        $query[] = 'PRIMARY KEY (`topic_project_id`), ';
        $query[] = 'KEY `idx_topic_id_project_id` (`topic_id`, `project_id`), ';
        $query[] = 'KEY `idx_project_id_topic_id` (`project_id`, `topic_id`) ';
        $query[] = ') ';
        $query[] = 'ENGINE = InnoDB ';
        $query[] = 'DEFAULT CHARACTER SET = utf8 ';
        $query[] = 'COLLATE = utf8_unicode_ci ';
        $query[] = 'AUTO_INCREMENT = 1; ';
		
		$queries[] = str_replace('%table%', $tableTopicToProject, implode("\n", $query));
		
		
		if ($versionDb < $version)
		{
            foreach ($queries as $query)
            {
                $stmt = $dbAdapter->query($query);

                $stmt->closeCursor();
            }
            
			$this->_setVersion($dbAdapter, $tableVersion, $version);
		}
		
		return $this;
    }
}