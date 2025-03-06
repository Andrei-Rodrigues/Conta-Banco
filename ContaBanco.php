<?php


class ContaBanco {
    //Atributos
    public $numConta;
    protected $tipo; 
    private $dono;
    private $saldo;
    private $status;
    
    //Métodos ------------------------------------------------------------------
    public function abrirConta($tipoConta){
        // Conta poupança ou corrente | se for cc ganha 50 pila | se for cp ganha 150 pila |
        
        $this->settipo($tipoConta);
        // status da conta definido com true
        $this->setstatus(true);
        
        if ($tipoConta == "CC"){            
            $this->setsaldo(50);            
        } elseif ($tipoConta == "CP") {            
            $this->setsaldo(150);            
        }       
    }
    
    public function fecharConta(){
        // nao posso ter dinheiro na conta, tenho que sacar
        // nao posso ta devendo pro banco
        
        if($this->getsaldo() > 0){
            
            echo "Erro ao fechar conta, seu saldo não pode ser positivo";
                        
        } else if($this->getsaldo() < 0){
            
            echo "Erro ao fechar conta, seu saldo não pode ser negativo";
            
        } else {
            // status da conta definido com false
            $this->setstatus(false);
        }
    }
    
    public function depositar($valorDeposito){
        // conta tem que estar aberta
        if($this->getstatus()){
            $this->setsaldo($this->getsaldo() + $valorDeposito);
        }else {
            echo "Impossível depositar";
        }
    }
    
    public function sacar($valorSaque){
        // conta tem que estar aberta
        // tem que ter saldo na conta
        if($this->getstatus()){
            if($this->getsaldo() > $valorSaque){
                $this->setsaldo($this->getsaldo() - $valorSaque);
                // saque de tanto autorizado  na conta de tanto
                echo "saque de $valorSaque autorizado na conta de $this->dono<br>";
            } else{
                echo "Saldo insuficiente";
            }           
        } else {
            echo "Conta não está aberta";
        }        
    }
    
    public function pagarMensal(){
        // conta tem que estar aberta
        // cc paga 12 e cp paga 20
        
        if($this->gettipo() == "CC"){
            $valorMensal = 12;
        } else if($this->gettipo() == "CP"){
            $valorMensal = 20;
        }
        
        if($this->getstatus()){
            if($this->getsaldo() > $valorMensal){
                $this->setsaldo($this->getsaldo() - $valorMensal);
            }else{
                "Saldo Insuficiente";
            }
        }else{
            echo "impossivel pagar, conta está fechada";
        }
    }        
    
    //Métodos Especiais ------------------------------------------------------------------
    
    public function __construct() {        
        $this->setSaldo(0);
        $this->setStatus(false);        
    }
    
        
    public function getnumConta(){
        return $this->numConta;
    }
    
    public function gettipo(){
        return $this->tipo;
    }
    
    public function getdono(){
        return $this->dono;
    }
    
    public function getsaldo(){
        return $this->saldo;
    }
    
    public function getstatus(){
        return $this->status;
    }
    
    public function setnumConta($numConta){
        return $this->numConta = $numConta;
    }
    
    public function settipo($tipo){
        return $this->tipo = $tipo;
    }
    
    public function setdono($dono){
        return $this->dono = $dono;
    }
    
    public function setsaldo($saldo){
        return $this->saldo = $saldo;
    }
    
    public function setstatus($status){
        return $this->status = $status;
    }
    


}
