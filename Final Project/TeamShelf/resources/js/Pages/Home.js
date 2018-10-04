import React, {Component} from 'react';

export default class Home extends Component {
    render() {
        return (
            <div className='fullPage marginTop background container'>
                <h1 className='formHeaderTitle'>
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
                    It allows graduates to fill some details, and a resume will
                    be generated for them so that employers would choose.
                </p>
                <strong>
                    <h2 className='formHeaderTitle'>Who Are We?</h2>
                </strong>
                <p>
                    We are a team of developers who are passionate about web
                    development and are looking to make the lookout for the
                    right employees as easy as possible.
                </p>

                <strong>
                    <h2 className='formHeaderTitle'>How To Use It?</h2>
                </strong>
                <p>
                    By simply logging in, editing your personal info, a resume
                    will be generated for you so that employees would find you
                    easier. This simplifies the process of candidates applying
                    for jobs, as well as employers looking for the right talent
                    for their job opening.
                </p>


            </div>
        );
    }
}