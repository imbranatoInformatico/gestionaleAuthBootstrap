import { divide, update } from 'lodash';
import React from 'react';
import ReactDOM from 'react-dom';
import { useState, useEffect } from 'react';

const RowTablePilotsRankings = (props) => {
    const {nome,cognome,nomeCategoria,puntiGara,puntiPresenza,puntiPole,totale} = props;

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
                {nomeCategoria}
            </td>
            <td>
                {puntiGara}
            </td>
            <td>
                {puntiPresenza}
            </td>
            <td>
                {puntiPole}
            </td>
            <td>
                {totale}
            </td>
           
        </tr>
    )
}

export default RowTablePilotsRankings
