import { divide } from 'lodash';
import React from 'react';
import ReactDOM from 'react-dom';
import { useState, useEffect } from 'react';
import RowTableCheck from './RowTableCheck';



function TableCheck() {

    const [lista, setListaCheck] = useState("");
    //recupero il valore di race_id della gara
    let race_id = document.getElementById("raceID").value;

    useEffect(() => {

        const url = "http://127.0.0.1:8000/api/checkPilotList/" + race_id;
    
        fetch(url).then(response => {
          if(response.ok){
            console.log("sono dentro");
            return response.json();
          }
          else{
            throw new Error('Problemi di conessione al endpoint api');
          }
        })
        .then((listaPilotiCheck) => {
         //console.log(listaPiloti)
          setListaCheck(listaPilotiCheck)
        
        })
    
      }, []);

      return (
        <table id="tablePilot" className="table table-responsive">
        <thead className="table-dark">
          <tr className="">
              <td>ID</td>
              <td>NOME</td>
              <td>COGNOME</td>
              <td>CATEGORIA</td>
              <td>ELIMINA</td>
          </tr>
        </thead>
        <tbody className="table-light">
        
            {
                Object.keys(lista).map((pilota) =>{
                    console.log(lista[pilota]);    

                    return <RowTableCheck key={lista[pilota].id} {...lista[pilota]}></RowTableCheck>

                  })  

                  
            }
        
            
        </tbody>
    </table> 
      );

}

export default TableCheck;

if (document.getElementById('tableReact')) {
    ReactDOM.render(<TableCheck />, document.getElementById('tableReact'));
}
