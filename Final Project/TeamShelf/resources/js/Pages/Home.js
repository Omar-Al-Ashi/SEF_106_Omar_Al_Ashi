import React, {Component} from 'react';

export default class Home extends Component {
    render() {
        return (
            <div className='fullPage marginTop background container'>
                <h1>
                    Welcome to TeamShelf
                </h1>
                <img
                    src={require('../../../public/images/people-shaking-hands.jpg')}
                    style={{height: 150, width: 150}}/>
                <p className='marginTop'>
                    TeamShelf is the gateway to find the right talent for the
                    right opportunity.
                    It is a platform for employers to find people with the right
                    set of talents and knowledge to fill a job vacancy.
                    It allows graduates to fill some details, and a resume will be generated for them so that employers would choose.
                </p>

            </div>
        );
    }
}