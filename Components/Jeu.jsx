import React, { Component } from 'react'

export default class Jeu extends Component {

  constructor(props){
    super(props);
    this.state = {nbr: 0, essai:0, message:"", btnMsg: "Changer"}
    this.answer = Math.round(Math.random()*10)
  }  
  answerTesting(){
    this.setState({nbr: Math.round(Math.random()*10)});
    if(this.state.nbr === this.answer){
      this.setState({message: "Congratulations !!!"});
      this.setState({btnMsg: "Resseyer"});
    } else {
      this.setState({message: "Try again"});
    }
    this.setState({essai: this.state.essai + 1});
    if(this.state.btnMsg === "Resseyer"){
      this.setState({nbr: 0, essai:0, message:"", btnMsg: "Changer"});
    }
  }

  render() {
    return (
      <div>
        <h1>Pioche:</h1>
        {/* <input type="number" value={this.state.nbr} onChange={(e)=>this.setState()}/> */}
        <p>{this.state.nbr}</p>
        <h2>Nombre d'essai: {this.state.essai}</h2>
        <p>{this.state.message}</p>
        <button onClick={()=>this.answerTesting()}>{this.state.btnMsg}</button>
      </div>
    )
  }
}
