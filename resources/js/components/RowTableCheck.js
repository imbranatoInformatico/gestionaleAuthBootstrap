import { divide } from 'lodash';
import React from 'react';
import ReactDOM from 'react-dom';
import { useState, useEffect } from 'react';

const RowTableCheck = (props) => {
    const {id,nome,cognome,nomeCategoria} = props;

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
        </tr>
    )
}

export default RowTableCheck
