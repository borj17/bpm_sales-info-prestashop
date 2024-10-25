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

        // Obtener ventas de periodos actuales y anteriores
        $ventasHoy = $this->getVentasHoy();
        $ventasAyer = $this->getVentasAyer();
        $ventasSemana = $this->getVentasSemana();
        $ventasSemanaPasada = $this->getVentasSemanaPasada();
        $ventasMes = $this->getVentasMes();
        $ventasMesPasado = $this->getVentasMesPasado();
        $ventasYear = $this->getVentasYear();
        $ventasYearPasado = $this->getVentasYearPasado();

        // Calcular cambios porcentuales
        $cambioHoy = $this->calcularCambioPorcentual($ventasAyer, $ventasHoy);
        $cambioSemana = $this->calcularCambioPorcentual($ventasSemanaPasada, $ventasSemana);
        $cambioMes = $this->calcularCambioPorcentual($ventasMesPasado, $ventasMes);
        $cambioYear = $this->calcularCambioPorcentual($ventasYearPasado, $ventasYear);

        // Asignar los valores a la plantilla
        $this->context->smarty->assign([
            'ventasHoy' => $ventasHoy,
            'ventasAyer' => $ventasAyer,
            'ventasSemana' => $ventasSemana,
            'ventasSemanaPasada' => $ventasSemanaPasada,
            'ventasMes' => $ventasMes,
            'ventasMesPasado' => $ventasMesPasado,
            'ventasYear' => $ventasYear,
            'ventasYearPasado' => $ventasYearPasado,
            'cambioHoy' => $cambioHoy,
            'cambioSemana' => $cambioSemana,
            'cambioMes' => $cambioMes,
            'cambioYear' => $cambioYear,
        ]);

        $this->setTemplate('salesinfo.tpl');
    }

    private function getVentasHoy()
    {
        $today = date('Y-m-d');
        return $this->getVentasPorFecha($today, $today);
    }

    private function getVentasAyer()
    {
        $yesterday = date('Y-m-d', strtotime('-1 day'));
        return $this->getVentasPorFecha($yesterday, $yesterday);
    }

    private function getVentasSemana()
    {
        $startOfWeek = date('Y-m-d', strtotime('monday this week'));
        $today = date('Y-m-d');
        return $this->getVentasPorFecha($startOfWeek, $today);
    }

    private function getVentasSemanaPasada()
    {
        $startOfLastWeek = date('Y-m-d', strtotime('monday last week'));
        $endOfLastWeek = date('Y-m-d', strtotime('sunday last week'));
        return $this->getVentasPorFecha($startOfLastWeek, $endOfLastWeek);
    }

    private function getVentasMes()
    {
        $startOfMonth = date('Y-m-01');
        $today = date('Y-m-d');
        return $this->getVentasPorFecha($startOfMonth, $today);
    }

    private function getVentasMesPasado()
    {
        $startOfLastMonth = date('Y-m-01', strtotime('first day of last month'));
        $endOfLastMonth = date('Y-m-t', strtotime('last day of last month'));
        return $this->getVentasPorFecha($startOfLastMonth, $endOfLastMonth);
    }

    private function getVentasYear()
    {
        $startOfYear = date('Y-01-01');
        $today = date('Y-m-d');
        return $this->getVentasPorFecha($startOfYear, $today);
    }

    private function getVentasYearPasado()
    {
        $startOfLastYear = date('Y-01-01', strtotime('first day of january last year'));
        $endOfLastYear = date('Y-12-31', strtotime('last day of december last year'));
        return $this->getVentasPorFecha($startOfLastYear, $endOfLastYear);
    }

    private function getVentasPorFecha($fechaInicio, $fechaFin)
    {
        $sql = new DbQuery();
        $sql->select('SUM(total_paid_tax_incl) as total');
        $sql->from('orders');
        $sql->where('date_add BETWEEN "' . pSQL($fechaInicio . ' 00:00:00') . '" AND "' . pSQL($fechaFin . ' 23:59:59') . '"');
        $sql->where('current_state != ' . (int)Configuration::get('PS_OS_CANCELED'));

        $result = Db::getInstance()->getValue($sql);

        return $result ? (float)$result : null;
    }

    private function calcularCambioPorcentual($valorAnterior, $valorActual)
    {
        if ($valorAnterior === null || $valorAnterior == 0) {
            return $valorActual ? 100 : 0;
        }

        return round((($valorActual - $valorAnterior) / $valorAnterior) * 100, 2);
    }
}
