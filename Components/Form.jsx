import React, { Component } from 'react'

export default class Form extends Component {
  constructor(props){
    super(props);
    this.state = {nom: "test", prenom: "test", checkbox: false}
  }
  modif(e){
    let name = e.target.name
    let variable = e.target.type === "checkbox" ? e.target.checked : e.target.value
    // if(name === "abonnement"){
    //     this.setState({checkbox: e.target.checked})
    // }
    this.setState({[name]: [variable]})
    console.log(this.state)
  }

//   modifPrenom(e){
//     this.setState({prenom: e.target.value})
//     console.log(this.state)
//   }
  render() {
    return (
      <form>
        <label htmlFor="nom">Nom</label>
        <input type="text" name="nom" id="nom" value={this.state.nom} onChange={(e)=>this.modif(e)}/><br/>

        <label htmlFor="prenom">Prenom</label>
        <input type="text" name="prenom" id="prenom" value={this.state.prenom} onChange={(e)=>this.modif(e)}/><br/>

        <input type="checkbox" name="abonnement" id="abonnement" checked={this.state.checkbox} onChange={(e)=>this.modif(e)}/>
        <label htmlFor="abonnement">Abonnement</label>

      </form>
    )
  }
}
// refaire un formulaire avec des list deroulante pour tester chaque element et comment l'utuliser
// lesson 6 il y a les formulaire