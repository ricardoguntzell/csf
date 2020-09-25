<?php
require_once '_app/conn/Conn.class.php';

class Historico extends Conn
{

    /** Objetos Principais */
    private $Id;
    private $Nome;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @param mixed $Id
     */
    public function setId($Id)
    {
        $this->Id = $Id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->Nome;
    }

    /**
     * @param mixed $Nome
     */
    public function setNome($Nome)
    {
        $this->Nome = $Nome;
    }


    public function getHistorico()
    {

        $this->getConn()->beginTransaction();

        $qry = "SELECT ";
        $qry .= "h.id,";
        $qry .= "h.nome ";
        $qry .= "FROM historico h ";
        $qry .= "WHERE h.id = :id ";

        $statement = $this->getConn()->prepare($qry);

        $statement->execute();
        $this->getConn()->commit();

        $rowCount = $statement->rowCount();

        if ($rowCount >= 1) {
            while ($line = $statement->FETCH(PDO::FETCH_ASSOC)) {
                $Historico = new self();
                $Historico->setId($line['id']);
                $Historico->setNome($line['nome']);

            }
            return $Historico;
        } else {
            return false;
        }

    }

    public function getHistoricos()
    {

        $this->getConn()->beginTransaction();
        $qry = "SELECT ";
        $qry .= "h.id,";
        $qry .= "h.nome ";
        $qry .= "FROM historico h ";
        $qry .= "ORDER BY id asc";

        $statement = $this->getConn()->prepare($qry);

        $statement->execute();
        $this->getConn()->commit();

        $rowCount = $statement->rowCount();

        if ($rowCount >= 1) {
            while ($line = $statement->FETCH(PDO::FETCH_ASSOC)) {
                $Historico = new self();
                $Historico->setId($line['id']);
                $Historico->setNome($line['nome']);

                $historicos[] = $Historico;
            }
            return $historicos;
        } else {
            return false;
        }

    }

}