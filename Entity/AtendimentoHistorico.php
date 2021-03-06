<?php

/*
 * This file is part of the Novo SGA project.
 *
 * (c) Rogerio Lino <rogeriolino@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Novosga\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * AtendimentoHistorico
 * historico de atendimento do banco de dados.
 *
 * @author Rogerio Lino <rogeriolino@gmail.com>
 */
class AtendimentoHistorico extends AbstractAtendimento
{
    /**
     * @var AtendimentoCodificadoHistorico[]
     */
    private $codificados;

    public function __construct()
    {
        $this->codificados = new ArrayCollection();
    }

    public function getCodificados()
    {
        return $this->codificados;
    }

    public function setCodificados(Collection $codificados)
    {
        $this->codificados = $codificados;

        return $this;
    }
}
