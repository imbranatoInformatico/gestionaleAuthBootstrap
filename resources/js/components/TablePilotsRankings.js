import { divide } from 'lodash';
import React from 'react';
import ReactDOM from 'react-dom';
import { useState, useEffect } from 'react';
import RowTablePilotsRankings from './RowTablePilotsRankings';



function TablePilotsRankings(){
  const [lista, setListaCheck] = useState("");
  const [listaRace, setListaRace] = useState("");

    
    useEffect(()=>{
        document.querySelector('select').addEventListener('change', function(){
            let rankId = document.querySelector('select').value;
           // console.log(rankId);

            const url = "http://127.0.0.1:8000/api/pilotsRankings/" + rankId ;

            fetch(url).then(response => {
                if(response.ok){
                 // console.log("sono dentro");
                  return response.json();
                }
                else{
                  throw new Error('Problemi di conessione al endpoint api');
                }
              })
              .then((listaPilotiRanking) => {
            //   console.log(listaPilotiRanking)
                setListaCheck(listaPilotiRanking)
              
              })
           
    
        });
    })

  
    return (
      
        
          Object.keys(lista).map((pilotaRanking) =>{
          //  console.log(lista[pilotaRanking]);    

            return <RowTablePilotsRankings key={pilotaRanking} {...lista[pilotaRanking]}></RowTablePilotsRankings>

          })  

      );
  
}

export default TablePilotsRankings;

if (document.getElementById('tableReactRankings')) {
    ReactDOM.render(<TablePilotsRankings />, document.getElementById('tableReactRankings'));
}
