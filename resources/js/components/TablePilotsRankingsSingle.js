import { divide } from 'lodash';
import React from 'react';
import ReactDOM from 'react-dom';
import { useState, useEffect } from 'react';
import RowTablePilotsRankingsSingleEvent from './RowTablePilotsRankingsSingleEvent';



function TablePilotsRankingsSingle(){
  const [lista, setListaCheck] = useState("");
  const [contatore, setContatore] = useState(0);


    
    useEffect(()=>{
        document.querySelector('select').addEventListener('change', function(){
            let rankId = document.querySelector('select').value;
            let raceId = document.getElementById('race_id').value;

            //console.log(raceId);

            const url = "http://127.0.0.1:8000/api/pilotsRankingsSingleEvento/" + rankId +"/"+ raceId;;


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
          

            return <RowTablePilotsRankingsSingleEvent key={pilotaRanking} {...lista[pilotaRanking]}></RowTablePilotsRankingsSingleEvent>

          })  

                  
            
        
        
            
     
      );
  
}

export default TablePilotsRankingsSingle;

if (document.getElementById('tableReactRankingsSingle')) {
    ReactDOM.render(<TablePilotsRankingsSingle />, document.getElementById('tableReactRankingsSingle'));
}
