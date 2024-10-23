<?php
/**
 * 2007-2020 PrestaShop and Contributors
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2020 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

class Bpm_SalesInfo extends Module
{
    public function __construct()
    {
        $this->name = 'bpm_salesinfo';
        $this->tab = 'analytics_stats';
        $this->version = '1.0.0';
        $this->author = 'Borja Pérez';
        $this->need_instance = 0;

        parent::__construct();

        $this->displayName = $this->l('Shop Performance BPM');
        $this->description = $this->l('Show data about the last day, week, month, and year, to let you know everything in a quick view.');

        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
    }

    public function install()
    {
        return parent::install() && $this->registerHook('backOfficeHeader') && $this->addTab();
    }

    public function hookBackOfficeHeader()
    {
        if (Tools::getValue('controller') == 'AdminBpmSalesInfo') {
            $this->context->controller->addCSS($this->_path . 'views/css/salesinfo.css');
            $this->context->controller->addJS($this->_path . 'views/js/salesinfo.js');
        }
    }

    public function getContent()
    {
        Tools::redirectAdmin($this->context->link->getAdminLink('AdminBpmSalesInfo'));
    }

    private function addTab()
    {
        $tab = new Tab();
        $tab->active = 1;
        $tab->name = array();
        foreach (Language::getLanguages(true) as $lang) {
            $tab->name[$lang['id_lang']] = 'Ventas BPM';
        }
        $tab->class_name = 'AdminBpmSalesInfo';
        $tab->id_parent = (int)Tab::getIdFromClassName('AdminParentStats');
        $tab->module = $this->name;

        return $tab->add();
    }

    public function uninstall()
    {
        $id_tab = (int)Tab::getIdFromClassName('AdminBpmSalesInfo');
        $tab = new Tab($id_tab);
        $tab->delete();

        return parent::uninstall();
    }
}
