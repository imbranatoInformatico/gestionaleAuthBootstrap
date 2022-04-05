import { divide, update } from 'lodash';
import React from 'react';
import ReactDOM from 'react-dom';
import { useState, useEffect } from 'react';

const RowTablePilotsRankingsSingleEvent= (props) => {
    const {nome,cognome,nomeClassifica,puntoGara1,puntoGara2, puntoPole, puntoPresenza,puntoPoleCategoria, totale} = props;

    const [pilotId, setPilotId] = useState("");
    const [lista, setListaCheck] = useState("");

  
    
    
  return (
        <tr>
            <td>
                
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
            <td>
               {parseInt(puntoGara1)}
            </td>
            <td>
               {parseInt(puntoGara2)}
            </td>
            <td>
                {parseInt(puntoPole)}
            </td>
            <td>
                {parseInt(puntoPoleCategoria)}
            </td>
            <td>
                {parseInt(puntoPresenza)}
            </td>
            <td>
                {parseInt(totale)}
            </td>
           
        </tr>
    )
}

export default RowTablePilotsRankingsSingleEvent
