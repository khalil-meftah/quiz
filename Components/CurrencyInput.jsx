import React, { Component } from 'react'

export default class CurrencyInput extends Component {
    constructor(){
        super();
        this.state = {currency: "MAD",}
    }
    render() {
    return (
        <> 
            <label htmlFor>{this.state.currency}</label>
            <input type="number" name="CurrencyInput"/>
        </>
    )
    }
}
