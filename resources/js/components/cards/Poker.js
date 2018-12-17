import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios'

import Odd from './Odd'
import Actions from "./Actions";
import SweetAlert from 'sweetalert2-react';

import {library} from '@fortawesome/fontawesome-svg-core'
import {faPercent} from '@fortawesome/free-solid-svg-icons'

import Cards from "./Cards";

library.add(faPercent)

export default class Poker extends Component {

    constructor(props) {
        super(props)

        this.handleStart = this.handleStart.bind(this)
        this.handleChange = this.handleChange.bind(this)
        this.handleNext = this.handleNext.bind(this)


        this.state = {
            value: 'H2-H10',
            cards: [],
            cardsOnBoard: [],
            odds: 0,
            turn: 0,
            disabledNext: true,
            disabledStart: false,
            match: false,
            lastOdds: 0
        }
    }

    handleStart() {
        axios.get('/newdeck').then(resp => {

            console.log(resp.data)
            this.setState({...this.state, cards: resp.data, disabledNext: false})
            this.Odds(this.state.value, this.state.cards, 0)
        })
    }

    handleNext() {
        this.Odds(this.state.value, this.state.cards, this.state.turn + 1)
        this.setState({...this.state, turn: this.state.turn + 1})
    }

    handleChange(e) {
        this.setState({...this.state, value: e.target.value})
    }

    Odds(value, deck, turn) {

        axios.post('/odds', {
            deck: deck,
            turn: turn,
            card: value
        }).then(resp => {
            this.setState({
                ...this.state,
                odds: resp.data.odds,
                cardsOnBoard: resp.data.cardsOnBoard,
                match: resp.data.match,
                lastOdds: resp.data.lastOdds
            })
        })
    }

    render() {
        return (

            <div>
                <Actions
                    value={this.state.value}
                    handleNext={this.handleNext}
                    handleChange={this.handleChange}
                    handleStart={this.handleStart}
                    disabledNext={this.state.disabledNext}
                    disabledStart={this.state.disabledStart}
                />
                <Odd odds={this.state.odds}/>
                <div className="container">
                    <Cards cardsOnBoard={this.state.cardsOnBoard}/>
                </div>
                <SweetAlert
                    show={this.state.match}
                    title={`Got it`}
                    text={`The chance was ${this.state.lastOdds}`}
                    onConfirm={() => { window.location.href = window.location.href}}
                />
            </div>


        );
    }
}

if (document.getElementById('app')) {
    ReactDOM.render(<Poker/>, document.getElementById('app'));
}
