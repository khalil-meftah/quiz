import React, {Component} from 'react'

export default class Item extends Component {

    render(){
        return(
            <div className="item">
                <img src={this.props.data.src} alt={this.props.data.name} />
                <p>{this.props.data.name}</p>
                <p>Prix: {this.props.data.prix}</p>
                <p>key: {this.props.key}</p>
            </div>
        )
    }
}