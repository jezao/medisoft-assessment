import React, {Component} from 'react'

const Card = props => {

    const getCard = (value, suit) => {

        if (value == 1 || value == 'A') {
            return (
                <section className={`card card--${suit}`} value={value} >
                    <div className="card__inner card__inner--centered">
                        <div className="card__column">
                            <div className="card__column card__column--centered">
                                <div className="card__symbol"></div>
                            </div>
                        </div>
                    </div>
                </section>
            )
        }

        if (value == 2) {
            return (
                <section className={`card card--${suit}`} value={value} >
                    <div className="card__inner card__inner--centered">
                        <div className="card__column">
                            <div className="card__symbol"></div>
                            <div className="card__symbol"></div>
                        </div>
                    </div>
                </section>
            )
        }

        if (value == 3) {
            return (
                <section className={`card card--${suit}`} value={value} >
                    <div className="card__inner card__inner--centered">
                        <div className="card__column">
                            <div className="card__symbol"></div>
                            <div className="card__symbol"></div>
                            <div className="card__symbol"></div>
                        </div>
                    </div>
                </section>
            )
        }

        if (value == 4) {
            return (
                <section className={`card card--${suit}`} value={value} >
                    <div className="card__inner">
                        <div className="card__column">
                            <div className="card__symbol"></div>
                            <div className="card__symbol"></div>
                        </div>
                        <div className="card__column">
                            <div className="card__symbol"></div>
                            <div className="card__symbol"></div>
                        </div>
                    </div>
                </section>
            )
        }

        if (value == 5) {
            return (
                <section className={`card card--${suit}`} value={value} >
                    <div className="card__inner">
                        <div className="card__column">
                            <div className="card__symbol"></div>
                            <div className="card__symbol"></div>
                        </div>
                        <div className="card__column card__column--centered">
                            <div className="card__symbol"></div>
                        </div>
                        <div className="card__column">
                            <div className="card__symbol"></div>
                            <div className="card__symbol"></div>
                        </div>
                    </div>
                </section>
            )
        }

        if (value == 6) {
            return (

                <section className={`card card--${suit}`} value={value} >
                    <div className="card__inner">
                        <div className="card__column">
                            <div className="card__symbol"></div>
                            <div className="card__symbol"></div>
                            <div className="card__symbol"></div>
                        </div>
                        <div className="card__column">
                            <div className="card__symbol"></div>
                            <div className="card__symbol"></div>
                            <div className="card__symbol"></div>
                        </div>
                    </div>
                </section>

            )
        }


        if (value == 7) {
            return (

                <section className={`card card--${suit}`} value={value} >
                    <div className="card__inner">
                        <div className="card__column">
                            <div className="card__symbol"></div>
                            <div className="card__symbol"></div>
                            <div className="card__symbol"></div>
                        </div>
                        <div className="card__column card__column--centered">
                            <div className="card__symbol card__symbol--huge"></div>
                        </div>
                        <div className="card__column">
                            <div className="card__symbol"></div>
                            <div className="card__symbol"></div>
                            <div className="card__symbol"></div>
                        </div>
                    </div>
                </section>

            )
        }

        if (value == 8) {
            return (

                <section className={`card card--${suit}`} value={value} >
                    <div className="card__inner">
                        <div className="card__column">
                            <div className="card__symbol"></div>
                            <div className="card__symbol"></div>
                            <div className="card__symbol"></div>
                        </div>
                        <div className="card__column card__column--centered">
                            <div className="card__symbol card__symbol--big"></div>
                            <div className="card__symbol card__symbol--big"></div>
                        </div>
                        <div className="card__column">
                            <div className="card__symbol"></div>
                            <div className="card__symbol"></div>
                            <div className="card__symbol"></div>
                        </div>
                    </div>
                </section>

            )
        }

        if (value == 9) {
            return (

                <section className={`card card--${suit}`} value={value} >
                    <div className="card__inner">
                        <div className="card__column">
                            <div className="card__symbol"></div>
                            <div className="card__symbol"></div>
                            <div className="card__symbol card__symbol--rotated"></div>
                            <div className="card__symbol"></div>
                        </div>
                        <div className="card__column card__column--centered">
                            <div className="card__symbol card__symbol"></div>
                        </div>
                        <div className="card__column">
                            <div className="card__symbol"></div>
                            <div className="card__symbol"></div>
                            <div className="card__symbol card__symbol--rotated"></div>
                            <div className="card__symbol"></div>
                        </div>
                    </div>
                </section>

            )
        }

        if (value == 10) {
            return (

                <section className={`card card--${suit}`} value={value} >
                    <div className="card__inner">
                        <div className="card__column">
                            <div className="card__symbol"></div>
                            <div className="card__symbol"></div>
                            <div className="card__symbol card__symbol--rotated"></div>
                            <div className="card__symbol"></div>
                        </div>
                        <div className="card__column card__column--centered">
                            <div className="card__symbol card__symbol--big"></div>
                            <div className="card__symbol card__symbol--big"></div>
                        </div>
                        <div className="card__column">
                            <div className="card__symbol"></div>
                            <div className="card__symbol"></div>
                            <div className="card__symbol card__symbol--rotated"></div>
                            <div className="card__symbol"></div>
                        </div>
                    </div>
                </section>

            )
        }

        if (value == "Q" || value == "J" || value == "K") {
            return (

                <section className={`card card--${suit}`} value={value} >
                    <div className="card__inner card__inner--centered">
                        <div className="card__column">
                            <div className="card__symbol--big"></div>
                        </div>
                    </div>
                </section>

            )
        }
    }

    let suit = props.card.substr(0,1);
    let value = props.card.replace(suit,'')

    return getCard(value, suit)


}

export default Card


