import React,  {Component} from 'react';

export default class CompState extends Component{
    constructor(){
        super();
        this.state = {key:1, desc: "Veilez vous inscrire", lib: "Inscription"}
    }
    inscription(){
        if (this.state.key === 1){
            this.setState({key:2, desc: "Inscription réalisé", lib: "Merci!"})
        }else{
            this.setState({key:1, desc: "Veilez vous inscrire", lib: "Inscription"})
        }
       
    }
    render(){
        return(
            <div>
                <h2>{this.state.key}-{this.state.desc}</h2>
                <button onClick={()=>this.inscription()}>{this.state.lib}</button>
            </div>
        )
    }
}
