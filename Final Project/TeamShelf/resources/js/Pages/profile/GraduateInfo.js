import React, {Component} from 'react';

export default class GraduateInfo extends Component {
    render(props) {
        return (
            <div>
                <h1>This is the graduate info page {this.props.id}</h1>
                {console.log("This is the graduate info page")}
            </div>
        );
    }
}