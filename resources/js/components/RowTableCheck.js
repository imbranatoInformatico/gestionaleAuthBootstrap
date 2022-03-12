import { divide, update } from 'lodash';
import React from 'react';
import ReactDOM from 'react-dom';
import { useState, useEffect } from 'react';

const RowTableCheck = (props) => {
    const {id,nome,cognome,nomeCategoria} = props;

    const [pilotId, setPilotId] = useState("");
    const [lista, setListaCheck] = useState("");

    function updateClick(id){
        console.log(id);
        let pilot_id = id;
        const url = "http://127.0.0.1:8000/api/updateCheck/" + pilot_id;
        console.log(url);

        const requestOptions = {
            method: 'PUT',
            headers: { 'Content-Type': 'application/json' },
        };

        fetch(url,requestOptions).then(response => {
            if(response.ok){
              console.log(response.json);
              return response.json();
            }
            else{
              throw new Error('Problemi di conessione al endpoint api');
            }
          })
          .then((listaPilotiCheck) => {
           //console.log(listaPiloti)
           
            setListaCheck(listaPilotiCheck)
            window.location.reload(false);

      
          })

    }
    
  /*  useEffect(() => {
        
        const url = "http://127.0.0.1:8000/api/updateCheck/" + `${pilotId}`;
        console.log(url)

        const requestOptions = {
            method: 'PUT',
            headers: { 'Content-Type': 'application/json' },
        };
        fetch(url,requestOptions).then(response => {
            if(response.ok){
              console.log(response.json);
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

      }) */

    return (
        <tr>
            <td>
                {id}
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
                    <button type="submit" className="btn btn-outline-danger" onClick={()=>updateClick(id)}>ANNULLA CHECK</button>
            </td>
        </tr>
    )
}

export default RowTableCheck
