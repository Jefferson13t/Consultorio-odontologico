<?php

require_once "persist.php";
require_once "Data.php";

class Pagamento extends persist {
    private string $tipo;
    private float $valor;
    private float $desconto;
    private float $imposto;
    private Data $dataDoPagamento;

    public function __construct(string $tipo, float $valor, float $desconto, float $imposto, Data $dataDoPagamento) {
        $this->setTipo($tipo);
        $this->setValor($valor);
        $this->setDesconto($desconto);
        $this->setImposto($imposto);
        $this->setDataDoPagamento($dataDoPagamento);
    }

    public function setTipo(string $tipo) {
        $this->tipo = $tipo;
    }
    public function getTipo(): string {
        return $this->tipo;
    }
    public function setValor(float $valor) {
        $this->valor = $valor;
    }
    public function getValor(): float {
        return $this->valor;
    }
    public function setDesconto(float $desconto) {
        $this->desconto = $desconto / 100;
    }
    public function getDesconto(): float {
        return $this->desconto;
    }
    public function setImposto(float $imposto) {
        $this->imposto = $imposto / 100;
    }
    public function getImposto(): float {
        return $this->imposto * $this->getValor() * (1 - $this->getDesconto());
    }
    public function setDataDoPagamento(Data $dataDoPagamento) {
        $this->dataDoPagamento = $dataDoPagamento;
    }
    public function getDataDoPagamento(): Data {
        return $this->dataDoPagamento;
    }
    public function getValorLiquido() {
        return $this->getValor() - $this->getImposto();
    }

  static public function getFilename() {
      return "Pagamento.php";
  }
}

//(string $tipo, float $valor, float $desconto, float $imposto, Data $dataDoPagamento)
//dia mes ano hora minuto
$pagamento = new Pagamento("Cartao", 850.00, 2, 27.5, new Data(date("d"), date("m"), date("y"), date("H"), date("i")));

echo "Tipo"  . PHP_EOL;
echo $pagamento->getTipo()  . PHP_EOL;
echo "desconto"  . PHP_EOL;
echo $pagamento->getDesconto()  . PHP_EOL;
echo "valor"  . PHP_EOL;
echo $pagamento->getValor()  . PHP_EOL;
echo "imposto"  . PHP_EOL;
echo $pagamento->getImposto()  . PHP_EOL;
echo "valorLiquido"  . PHP_EOL;
echo $pagamento->getValorLiquido()  . PHP_EOL;