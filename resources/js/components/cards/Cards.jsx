import React, {Component} from 'react'
import Card from './Card'

const Cards = props => {

    const renderCards = () => {
        const list = props.cardsOnBoard || []

        return list.map(card => (

            <Card card={card} key={card} />
        ))
    };

    return (
            <section className={`cards`}>
                {renderCards()}
            </section>
        )

}

export default Cards;
