import React, { Component } from 'react'
import CurrencyInput from './CurrencyInput'

export default class CurrencyApp extends Component {
  render() {
    return (
      <div>
        <CurrencyInput />
        <CurrencyInput />
      </div>
    )
  }
}
