import { divide, update } from 'lodash';
import React from 'react';
import ReactDOM from 'react-dom';
import { useState, useEffect } from 'react';

const RowTablePilotsRankingsSingleEvent= (props) => {
    const {posizione,nome,cognome,nomeClassifica,puntoGara1,puntoGara2, puntoPole, puntoPresenza,puntoPoleCategoria, totale} = props;

    const [contatore, setContatore] = useState(0);
    
  

    
    
  return (
        <tr>
            <td className="text-center">
               {posizione}
            </td>
            <td>
                {nome}
            </td>
            <td>
                {cognome}
            </td>
            <td>
                {/* risolvere il problema della doppia categoria in visualizzazione */}
                {nomeClassifica}
            </td>
            <td className="text-center">
               {parseInt(puntoGara1)}
            </td >
            <td className="text-center">
               {parseInt(puntoGara2)}
            </td>
            <td className="text-center">
                {parseInt(puntoPole)}
            </td>
            <td className="text-center">
                {parseInt(puntoPoleCategoria)}
            </td>
            <td className="text-center">
                {parseInt(puntoPresenza)}
            </td>
            <td className="text-center">
                {parseInt(totale)}
            </td>
           
        </tr>
    )
}

export default RowTablePilotsRankingsSingleEvent
