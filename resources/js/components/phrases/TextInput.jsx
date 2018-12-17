import React, {Component} from 'react';

export default props => (
      <div className="input-wrapper">
                <input type="text" maxLength={`255`} placeholder="Phrase" value={props.phrase} onKeyPress={props.handleKeyPress} onChange={props.handleChange} />
      </div>
)

