import { divide } from 'lodash';
import React from 'react';
import ReactDOM from 'react-dom';
import { useState, useEffect } from 'react';
import RowTablePilotsRankings from './RowTablePilotsRankings';


function TablePilotsRankings(){
  const [lista, setListaCheck] = useState("");

    
    useEffect(()=>{
        document.querySelector('select').addEventListener('change', function(){
            let rankId = document.querySelector('select').value;
           // console.log(rankId);

            const url = "http://127.0.0.1:8000/api/pilotsRankings/" + rankId;

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
        <table id="tablePilot" className="table table-responsive">
        <thead className="table-dark">
          <tr className="">
              <td>POSIZIONE</td>
              <td>NOME</td>
              <td>COGNOME</td>
              <td>CATEGORIA</td>
              <td>PUNTI GARA</td>
              <td>PUNTI PRESENZA</td>
              <td>PUNTI POLE POSITION</td>
              <td>TOTALE</td>
          </tr>
        </thead>
        <tbody className="table-light">
        {
                Object.keys(lista).map((pilotaRanking) =>{
              //      console.log(lista[pilotaRanking]);    

                    return <RowTablePilotsRankings key={lista[pilotaRanking].id} {...lista[pilotaRanking]}></RowTablePilotsRankings>

                  })  

                  
            }
        
        
            
        </tbody>
    </table> 
      );
  
}

export default TablePilotsRankings;

if (document.getElementById('tableReactRankings')) {
    ReactDOM.render(<TablePilotsRankings />, document.getElementById('tableReactRankings'));
}
