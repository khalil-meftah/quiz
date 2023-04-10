import React, { Component } from 'react'

export default class Compteur extends Component {

    constructor(props){
        super(props);
        this.state = {number: this.props.start}
    }
    incrementer(){
        let incremented = this.state.number+1;
        this.setState({number: incremented})
    }
    decrementer(){
        let decremented = this.state.number-1;
        this.setState({number: decremented})
    }
  render() {
    return (
        <div>
        <h1>Compteur</h1>
        <p>{this.state.number}</p>
        <button onClick={()=>this.incrementer()}>Incrementer</button>
        <button onClick={()=>this.decrementer()}>Decrementer</button>
        </div>
      )
  }
}
