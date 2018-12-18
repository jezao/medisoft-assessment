import React, { Component } from 'react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'


export default  props => (
    <nav className="navbar navbar-light bg-light">
        <a className="navbar-brand" href="#"><FontAwesomeIcon icon="percent" /> Odd Calc</a>
        <div className={`form-inline`}>
            <input className="form-control mr-sm-2" value={props.value} type="text" placeholder="Card Hank" aria-label="Card Rank"  onChange={props.handleChange} readOnly={props.ReadOnly} />
            <button className="btn btn-primary " type="submit" onClick={props.handleStart} disabled={props.disabledStart} >Shuffle Cards</button>
            &nbsp;
            <button className="btn btn-success " type="submit" onClick={props.handleNext} disabled={props.disabledNext} >Call</button>
        </div>
    </nav>
)

