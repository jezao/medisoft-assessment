import React, {Component} from 'react';
import Char from './Char'

const Chars = props => {

    const renderChars = () => {
        console.log('PROPSCHAR=',props.chars)
        const list = props.chars || []

        return list.map(char => (

            <Char char={char} key={char.char} />
        ))
    };

    return (
        <section className={`chars`}>
            {renderChars()}
        </section>
    )

}

export default Chars;

