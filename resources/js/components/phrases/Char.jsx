import React, {Component} from 'react'

const Char = props => {
    return (
        <div style={{marginBottom: '3px'}}>

            <button type="button" className="btn btn-dark">
                <span className="badge badge-light">{props.char.char}</span>
            </button>

            <button type="button" className="btn btn-primary">
                Count <span className="badge badge-light">{props.char.count}</span>
            </button>


            {   props.char.before_after.before && (
                <button type="button" className="btn btn-warning">
                    Before <span className="badge badge-light">{props.char.before_after.before}</span>
                </button>
            )
            }

            {   props.char.before_after.after && (
                <button type="button" className="btn btn-success">
                    After <span className="badge badge-light">{props.char.before_after.after}</span>
                </button>
            )
            }

            {   props.char.max_distance >= 0 && (
                <button type="button" className="btn btn-danger">
                    Distance <span className="badge badge-light">{props.char.max_distance}</span>
                </button>
            )
            }
        </div>
    )


}

export default Char


