import React, {Component} from 'react';

require('../../styles/styles.css');


export default class Edit extends Component {

    render() {
        return (
            <div>
                <div className="left">
                    <h2>Basic Info</h2>
                    <div className="centered">
                        <div className='jumbotron'>
                            <form>
                                <div className='form-group'>
                                    <label htmlFor="date_of_birth">Date of
                                        Birth</label>
                                    <input type='date'
                                           placeholder='Date of Birth'
                                           className='form-control'
                                           id='date_of_birth'/>

                                    <label for="gender">Gender</label>
                                    <input type='radio'
                                           placeholder='Male'
                                           className='form-control'
                                           id='Male'/>
                                    <input type='radio'
                                           placeholder='Female'
                                           className='form-control'
                                           id='Female'/>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div className="middle">
                    <div className="centered">
                        <img
                            src={require('../../../../storage/app/public/images/TeamShelf.png')}
                            alt="Avatar woman"/>
                        <h2>Jane Flex</h2>
                        <p>Some text.</p>
                    </div>
                </div>

                <div className="right">
                    <div className="centered">
                        <img
                            src={require('../../../../storage/app/public/images/TeamShelf.png')}
                            alt="Avatar man"/>
                        <h2>John Doe</h2>
                        <p>Some text here too.</p>
                    </div>
                </div>
            </div>
        );
    }
}