import { divide, update } from 'lodash';
import React from 'react';
import ReactDOM from 'react-dom';
import { useState, useEffect } from 'react';

const RowTablePilotsRankingsSingleEvent= (props) => {
    const {posizioneD,nome,cognome,coloreRank,img,nomeClassifica,puntiGaraGiornata, puntoPole, puntoPoleCategoria,puntoPresenza, totale} = props;

    
  

    
    
  return (
    <tr>
        <td className="text-center">
            <div style={{ background: `linear-gradient(120deg, ${coloreRank} 0%, transparent 26%, transparent 26%)` }}>{posizioneD}</div>
        </td>
        <td className="text-center">
            {nome} {cognome}
        </td>
        <td className="text-center">
            <div style={{ backgroundColor: coloreRank}}> {nomeClassifica} </div>
        </td>
        <td className="text-center">
            {puntiGaraGiornata}
        </td>
        <td className="text-center">
            {parseInt(puntoPresenza)}
        </td>
        <td className="text-center">
            {parseInt(puntoPole)}
        </td>
        <td className="text-center">
            {parseInt(puntoPoleCategoria)}
        </td>
        <td className="text-center fs-4 text" style={{ backgroundColor: coloreRank }}>
        {parseInt(totale)}
        </td>
    </tr>
    )
}

export default RowTablePilotsRankingsSingleEvent
