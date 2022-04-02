import { divide, update } from 'lodash';
import React from 'react';
import ReactDOM from 'react-dom';
import { useState, useEffect } from 'react';

const RowTablePilotsRankings = (props) => {
    const {nome,cognome,nomeClassifica,puntiGare1,puntiGare2, puntiPole, puntiPresenza} = props;

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
               {parseInt(puntiGare1) + parseInt(puntiGare2)}
            </td>
            <td>
                {parseInt(puntiPresenza)}
            </td>
            <td>
                {parseInt(puntiPole)}
            </td>
            <td>
                {parseInt(puntiGare1) + parseInt(puntiGare2) + parseInt(puntiPresenza) + parseInt(puntiPole)}
            </td>
           
        </tr>
    )
}

export default RowTablePilotsRankings
