<?php

class AdminBpmSalesInfoController extends ModuleAdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->bootstrap = true;
    }

    public function initContent()
    {
        parent::initContent();

        // Set the info about sales from different period times
        $salesToday = $this->getSalesToday();
        $salesYesterday = $this->getSalesYesterday();
        $salesWeek = $this->getSalesWeek();
        $salesLastWeek = $this->getSalesLastWeek();
        $salesMonth = $this->getSalesMonth();
        $salesLastMonth = $this->getSalesLastMonth();
        $salesYear = $this->getSalesYear();
        $salesLastYear = $this->getSalesLastYear();

        // Set the info from the calculated percentage changes in sales
        $salesImprovementToday = $this->calculatePercentageChangeSales($salesYesterday, $salesToday);
        $salesImprovementWeek = $this->calculatePercentageChangeSales($salesLastWeek, $salesWeek);
        $salesImprovementMonth = $this->calculatePercentageChangeSales($salesLastMonth, $salesMonth);
        $salesImprovementYear = $this->calculatePercentageChangeSales($salesLastYear, $salesYear);


        // Set the info about abandonedCarts from differente period times
        $abandonedCartsToday = $this->getAbandonedCartsToday();
        $abandonedCartsYesterday = $this->getAbandonedCartsYesterday();
        $abandonedCartsWeek = $this->getAbandonedCartsWeek();
        $abandonedCartsLastWeek = $this->getAbandonedCartsLastWeek();
        $abandonedCartsMonth = $this->getAbandonedCartsMonth();
        $abandonedCartsLastMonth = $this->getAbandonedCartsLastMonth();
        $abandonedCartsYear = $this->getAbandonedCartsYear();
        $abandonedCartsLastYear = $this->getAbandonedCartsLastYear();

        // Set the info from the calculated percentage changes in abandoned carts
        $abandonedCartsImprovementToday = $this->calculatePercentageChangeAbandonedCarts($abandonedCartsYesterday, $abandonedCartsToday);
        $abandonedCartsImprovementWeek = $this->calculatePercentageChangeAbandonedCarts($abandonedCartsLastWeek, $abandonedCartsWeek);
        $abandonedCartsImprovementMonth = $this->calculatePercentageChangeAbandonedCarts($abandonedCartsLastMonth, $abandonedCartsMonth);
        $abandonedCartsImprovementYear = $this->calculatePercentageChangeAbandonedCarts($abandonedCartsLastYear, $abandonedCartsYear);


        // Assign the values to salesinfo template
        $this->context->smarty->assign([
            'salesToday' => $salesToday,
            'salesYesterday' => $salesYesterday,
            'salesWeek' => $salesWeek,
            'salesLastWeek' => $salesLastWeek,
            'salesMonth' => $salesMonth,
            'salesLastMonth' => $salesLastMonth,
            'salesYear' => $salesYear,
            'salesLastYear' => $salesLastYear,
            'salesImprovementToday' => $salesImprovementToday,
            'salesImprovementWeek' => $salesImprovementWeek,
            'salesImprovementMonth' => $salesImprovementMonth,
            'salesImprovementYear' => $salesImprovementYear,
            'abandonedCartsToday' => $abandonedCartsToday,
            'abandonedCartsYesterday' => $abandonedCartsYesterday,
            'abandonedCartsWeek' => $abandonedCartsWeek,
            'abandonedCartsLastWeek' => $abandonedCartsLastWeek,
            'abandonedCartsMonth' => $abandonedCartsMonth,
            'abandonedCartsLastMonth' => $abandonedCartsLastMonth,
            'abandonedCartsYear' => $abandonedCartsYear,
            'abandonedCartsLastYear' => $abandonedCartsLastYear,
            'abandonedCartsImprovementToday' => $abandonedCartsImprovementToday,
            'abandonedCartsImprovementWeek' => $abandonedCartsImprovementWeek,
            'abandonedCartsImprovementMonth' => $abandonedCartsImprovementMonth,
            'abandonedCartsImprovementYear' => $abandonedCartsImprovementYear,
        ]);

        $this->setTemplate('salesinfo.tpl');
    }

    private function getSalesToday()
    {
        $today = date('Y-m-d');
        return $this->getSalesByDate($today, $today);
    }

    private function getSalesYesterday()
    {
        $yesterday = date('Y-m-d', strtotime('-1 day'));
        return $this->getSalesByDate($yesterday, $yesterday);
    }

    private function getSalesWeek()
    {
        $startOfWeek = date('Y-m-d', strtotime('monday this week'));
        $today = date('Y-m-d');
        return $this->getSalesByDate($startOfWeek, $today);
    }

    private function getSalesLastWeek()
    {
        $startOfLastWeek = date('Y-m-d', strtotime('monday last week'));
        $endOfLastWeek = date('Y-m-d', strtotime('sunday last week'));
        return $this->getSalesByDate($startOfLastWeek, $endOfLastWeek);
    }

    private function getSalesMonth()
    {
        $startOfMonth = date('Y-m-01');
        $today = date('Y-m-d');
        return $this->getSalesByDate($startOfMonth, $today);
    }

    private function getSalesLastMonth()
    {
        $startOfLastMonth = date('Y-m-01', strtotime('first day of last month'));
        $endOfLastMonth = date('Y-m-t', strtotime('last day of last month'));
        return $this->getSalesByDate($startOfLastMonth, $endOfLastMonth);
    }

    private function getSalesYear()
    {
        $startOfYear = date('Y-01-01');
        $today = date('Y-m-d');
        return $this->getSalesByDate($startOfYear, $today);
    }

    private function getSalesLastYear()
    {
        $startOfLastYear = date('Y-01-01', strtotime('first day of january last year'));
        $endOfLastYear = date('Y-12-31', strtotime('last day of december last year'));
        return $this->getSalesByDate($startOfLastYear, $endOfLastYear);
    }

    private function getSalesByDate($fechaInicio, $fechaFin)
    {
        $sql = new DbQuery();
        $sql->select('SUM(total_paid_tax_incl) as total');
        $sql->from('orders');
        $sql->where('date_add BETWEEN "' . pSQL($fechaInicio . ' 00:00:00') . '" AND "' . pSQL($fechaFin . ' 23:59:59') . '"');
        $sql->where('current_state != ' . (int)Configuration::get('PS_OS_CANCELED'));

        $result = Db::getInstance()->getValue($sql);

        return $result ? (float)$result : null;
    }

    private function getCarritosAbandonadosPorFecha($fechaInicio, $fechaFin)
    {
        $sql = new DbQuery();
        $sql->select('COUNT(*)');
        $sql->from('cart');
        $sql->where('date_add BETWEEN "' . pSQL($fechaInicio . ' 00:00:00') . '" AND "' . pSQL($fechaFin . ' 23:59:59') . '"');
        $sql->where('id_cart NOT IN (SELECT id_cart FROM ' . _DB_PREFIX_ . 'orders)');

        return (int)Db::getInstance()->getValue($sql);
    }

    private function getAbandonedCartsToday()
    {
        $today = date('Y-m-d');
        return $this->getCarritosAbandonadosPorFecha($today, $today);
    }

    private function getAbandonedCartsYesterday()
    {
        $yesterday = date('Y-m-d', strtotime('-1 day'));
        return $this->getCarritosAbandonadosPorFecha($yesterday, $yesterday);
    }

    private function getAbandonedCartsWeek()
    {
        $startOfWeek = date('Y-m-d', strtotime('monday this week'));
        $today = date('Y-m-d');
        return $this->getCarritosAbandonadosPorFecha($startOfWeek, $today);
    }

    private function getAbandonedCartsLastWeek()
    {
        $startOfLastWeek = date('Y-m-d', strtotime('monday last week'));
        $endOfLastWeek = date('Y-m-d', strtotime('sunday last week'));
        return $this->getCarritosAbandonadosPorFecha($startOfLastWeek, $endOfLastWeek);
    }

    private function getAbandonedCartsMonth()
    {
        $startOfMonth = date('Y-m-01');
        $today = date('Y-m-d');
        return $this->getCarritosAbandonadosPorFecha($startOfMonth, $today);
    }

    private function getAbandonedCartsLastMonth()
    {
        $startOfLastMonth = date('Y-m-01', strtotime('first day of last month'));
        $endOfLastMonth = date('Y-m-t', strtotime('last day of last month'));
        return $this->getCarritosAbandonadosPorFecha($startOfLastMonth, $endOfLastMonth);
    }

    private function getAbandonedCartsYear()
    {
        $startOfYear = date('Y-01-01');
        $today = date('Y-m-d');
        return $this->getCarritosAbandonadosPorFecha($startOfYear, $today);
    }

    private function getAbandonedCartsLastYear()
    {
        $startOfLastYear = date('Y-01-01', strtotime('first day of january last year'));
        $endOfLastYear = date('Y-12-31', strtotime('last day of december last year'));
        return $this->getCarritosAbandonadosPorFecha($startOfLastYear, $endOfLastYear);
    }

    private function calculatePercentageChangeSales($valorAnterior, $valorActual)
    {
        if ($valorAnterior === null || $valorAnterior == 0) {
            return $valorActual ? 100 : 0;
        }
        return round((($valorActual - $valorAnterior) / $valorAnterior) * 100, 2);
    }

    private function calculatePercentageChangeAbandonedCarts($valorAnterior, $valorActual)
    {
        if ($valorAnterior === null || $valorAnterior == 0) {
            return $valorActual ? -100 : 0;
        }
        return -round((($valorActual - $valorAnterior) / $valorAnterior) * 100, 2);
    }

}
