import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios'

import TextInput from './TextInput'
import Chars from './Chars'


export default class Phrases extends Component {

    constructor(props) {
        super(props)

        this.handleChange = this.handleChange.bind(this)
        this.handleKeyPress = this.handleKeyPress.bind(this)

        this.state = {
            phrase: 'Soccer vs Football',
            chars: []
        }
    }

    handleKeyPress(e) {
        if (e.key === 'Enter') {
            this.getPhraseInfo(this.state.phrase)
        }
    }


    handleChange(e) {
        this.setState({...this.state, phrase: e.target.value})
    }

    getPhraseInfo(phrase) {

        console.log('getting phrase info', phrase)

        axios.post('/analyze', {phrase: phrase}).then(resp => {
            this.setState({
                ...this.state,
                chars: resp.data
            });
            console.log("STATE=",this.state.chars)
        });
    }

    render() {
        return (
            <div>

                <TextInput handleChange={this.handleChange}
                           handleKeyPress={this.handleKeyPress}
                           phrase={this.state.phrase}
                />

                <div className="d-flex justify-content-center">
                    <Chars chars={this.state.chars}/>
                </div>

            </div>
        )
    }
}

if (document.getElementById('app')) {
    ReactDOM.render(<Phrases/>, document.getElementById('app'));
}
