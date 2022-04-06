import { divide, update } from 'lodash';
import React from 'react';
import ReactDOM from 'react-dom';
import { useState, useEffect } from 'react';

const RowTablePilotsRankings = (props) => {
    const {posizione,nome,cognome,img,nomeClassifica,puntiGare1,puntiGare2, puntiPole, puntiPresenza, totale} = props;

  return (
        <tr>
            <td className="text-center">
                {posizione}
            </td>
            <td>
                {nome} {cognome}
            </td>
            <td>
                {/* risolvere il problema della doppia categoria in visualizzazione */}
                {nomeClassifica}
            </td>
            <td className="text-center">
               {parseInt(puntiGare1) + parseInt(puntiGare2)}
            </td>
            <td className="text-center">
                {parseInt(puntiPresenza)}
            </td>
            <td className="text-center">
                {parseInt(puntiPole)}
            </td>
            <td className="text-center">
                {parseInt(totale)}
            </td>
           
        </tr>
    )
}

export default RowTablePilotsRankings
