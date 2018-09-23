import React, {Component} from 'react';
import {RadioGroup, RadioButton} from 'react-radio-buttons';
import axios from 'axios';

require('../../styles/styles.css');
import 'font-awesome/css/font-awesome.min.css';


export default class Edit extends Component {

    constructor() {
        super();
        this.state = {
            admins: [],
            dob: '',
            gender: '',
            phone: '',
            selectedFile: null,
            first_name: '',
            last_name: '',
            residency_location: '',
            major: '',
            institute: '',
            education_start_date: '',
            education_end_date: '',
            gpa: '',
            certificate_name: '',
            education_description: '',
            isCurrentJob: null,
            experience_start_date: '',
            experience_end_date: '',
            title: '',
            company_name: '',
            company_location: '',
            description: '',
            skills: '',
            skill_level: '',
            linkedin: '',
            github: '',
        };
        this.onGenderChange = this.onGenderChange.bind(this);
        this.onProfilePicChange = this.onProfilePicChange.bind(this);
        this.fileUploadHandler = this.fileUploadHandler.bind(this);
        this.handleIsCurrentJobChange = this.handleIsCurrentJobChange.bind(this);
        this.handleFormSubmit = this.handleFormSubmit.bind(this);
        this.handleDOBChange = this.handleDOBChange.bind(this);
        this.handlePhoneChange = this.handlePhoneChange.bind(this);
        this.handleFirstNameChange = this.handleFirstNameChange.bind(this);
        this.handleLastNameChange = this.handleLastNameChange.bind(this);
        this.handleResidencyLocationChange = this.handleResidencyLocationChange.bind(this);
        this.handleMajorChange = this.handleMajorChange.bind(this);
        this.handleInstituteChange = this.handleInstituteChange.bind(this);
        this.handleEducationStartDateChange = this.handleEducationStartDateChange.bind(this);
        this.handleEducationEndDateChange = this.handleEducationEndDateChange.bind(this);
        this.handleGPAChange = this.handleGPAChange.bind(this);
        this.handleCertificateNameChange = this.handleCertificateNameChange.bind(this);
        this.handleExperienceStartDateChange = this.handleExperienceStartDateChange.bind(this);
        this.handleExperienceEndDateChange = this.handleExperienceEndDateChange.bind(this);
        this.handleTitleChange = this.handleTitleChange.bind(this);
        this.handleCompanyNameChange = this.handleCompanyNameChange.bind(this);
        this.handleCompanyLocationChange = this.handleCompanyLocationChange.bind(this);
        this.handleDescriptionChange = this.handleDescriptionChange.bind(this);
        this.handleSkillsChange = this.handleSkillsChange.bind(this);
        this.handleLinkedinChange = this.handleLinkedinChange.bind(this);
        this.handleGithubChange = this.handleGithubChange.bind(this);
        this.handleEducationDescriptionChange = this.handleEducationDescriptionChange.bind(this);
        this.handleSkillLevelChange = this.handleSkillLevelChange.bind(this);
    }

    onGenderChange(value) {
        this.setState({
            gender: value
        });
    }

    onProfilePicChange(event) {
        this.setState({
            selectedFile: event.target.files[0]
        });
    };

    fileUploadHandler() {
        //TODO I think I should set the image state
        const formData = new FormData();
        formData.append('image', this.state.selectedFile, this.state.selectedFile.name);
        // TODO change the post request URL
        axios.post('my-domain.com/file-upload', formData, {
            onUploadProgress: progressEvent => {
                //This is showing the percentage uploaded
                console.log('Upload progress' + Math.round(progressEvent.loaded / progressEvent.total * 100 + '%'));
            }
        })
            .then(res => {
                console.log(res.data);
            })
    }

    handleIsCurrentJobChange(value) {
        this.setState({
            isCurrentJob: value
        });
    }

    handleDOBChange(value) {
        this.setState({
            dob: value.target.value
        });
    }

    handlePhoneChange(value) {
        this.setState({
            phone: value.target.value
        });
    }

    handleFirstNameChange(value) {
        this.setState({
            first_name: value.target.value
        });
    }

    handleLastNameChange(value) {
        this.setState({
            last_name: value.target.value
        });
    }

    handleResidencyLocationChange(value) {
        this.setState({
            residency_location: value.target.value
        });
    }

    handleMajorChange(value) {
        this.setState({
            major: value.target.value
        });
    }

    handleInstituteChange(value) {
        this.setState({
            institute: value.target.value
        });
    }

    handleEducationStartDateChange(value) {
        this.setState({
            education_start_date: value.target.value
        });
    }

    handleEducationEndDateChange(value) {
        this.setState({
            education_end_date: value.target.value
        });
    }

    handleGPAChange(value) {
        this.setState({
            gpa: value.target.value
        });
    }

    handleCertificateNameChange(value) {
        this.setState({
            certificate_name: value.target.value
        });
    }

    handleEducationDescriptionChange(value) {
        this.setState({
            education_description: value.target.value
        });
    }

    handleExperienceStartDateChange(value) {
        this.setState({
            experience_start_date: value.target.value
        });
    }

    handleExperienceEndDateChange(value) {
        this.setState({
            experience_end_date: value.target.value
        });
    }

    handleTitleChange(value) {
        this.setState({
            title: value.target.value
        });
    }

    handleCompanyNameChange(value) {
        this.setState({
            company_name: value.target.value
        });
    }

    handleCompanyLocationChange(value) {
        this.setState({
            company_location: value.target.value
        });
    }

    handleDescriptionChange(value) {
        this.setState({
            description: value.target.value
        });
    }

    handleSkillsChange(value) {
        this.setState({
            skills: value.target.value
        });
    }

    handleSkillLevelChange(value) {
        this.setState({
            skill_level: value.target.value
        });
    }

    handleLinkedinChange(value) {
        this.setState({
            linkedin: value.target.value
        });
    }

    handleGithubChange(value) {
        this.setState({
            github: value.target.value
        });
    }

    handleFormSubmit(event) {
        let formData = {
            //TODO I need to dynamically send the id not statically
            id: 12,
            dob: this.state.dob,
            gender: this.state.gender,
            phone: this.state.phone,
            first_name: this.state.first_name,
            last_name: this.state.last_name,
            residency_location: this.state.residency_location,
            major: this.state.major,
            institute: this.state.institute,
            education_start_date: this.state.education_start_date,
            education_end_date: this.state.education_end_date,
            gpa: this.state.gpa,
            certificate_name: this.state.certificate_name,
            education_description: this.state.education_description,
            isCurrentJob: this.state.isCurrentJob,
            experience_start_date: this.state.experience_start_date,
            experience_end_date: this.state.experience_end_date,
            title: this.state.title,
            company_name: this.state.company_name,
            company_location: this.state.company_location,
            description: this.state.description,
            skills: this.state.skills,
            skill_level: this.state.skill_level,
            linkedin: this.state.linkedin,
            github: this.state.github,
        };

        event.preventDefault();
        axios.post('/api/graduate/store', formData)
            .then(res => res.data.response_code === 1 ? 'It worked' : 'something went wrong');
    }


    render() {
        return (
            <div>
                <form onSubmit={this.handleFormSubmit}>
                    <div className="left">
                        <h2>Basic Info</h2>
                        <div className="centered">
                            <div className='jumbotron'>
                                <div className='form-group'>

                                    {/*Date of Birth*/}
                                    <div className='date_of_birth'>
                                        <label htmlFor="date_of_birth">Date of
                                            Birth</label>
                                        <input type='date'
                                               placeholder='Date of Birth'
                                               className='form-control'
                                               id='date_of_birth'
                                               value={this.state.dob}
                                               onChange={this.handleDOBChange}
                                               required/>
                                    </div>

                                    {/*Gender*/}
                                    <div className='gender'>
                                        <RadioGroup
                                            onChange={this.onGenderChange}
                                            horizontal
                                            selectedvalue={"Male"}>
                                            <RadioButton value="Male">
                                                Male
                                            </RadioButton>
                                            <RadioButton value="Female">
                                                Female
                                            </RadioButton>
                                            <RadioButton value="Other">
                                                Other
                                            </RadioButton>
                                        </RadioGroup>
                                    </div>
                                </div>

                                {/*Phone*/}
                                <div className='phone'>
                                    <label htmlFor="phone">Phone</label>
                                    <input type='phone'
                                           placeholder='Phone'
                                           className='form-control'
                                           id='phone'
                                           value={this.state.phone}
                                           onChange={this.handlePhoneChange}
                                           required/>
                                </div>

                                {/*Profile Pic*/}
                                <div className='profile_pic'>

                                    {/*TODO change the button of the upload pic*/}
                                    <label htmlFor="profile_pic">Profile
                                        Picture</label>
                                    <input type="file"
                                           onChange={this.onProfilePicChange}
                                           required/>
                                    {/*<button*/}
                                    {/*onClick={this.fileUploadHandler}>Upload!*/}
                                    {/*</button>*/}
                                </div>

                                {/*First Name*/}
                                <div className='first_name'>
                                    <label htmlFor="first_name">First
                                        Name</label>
                                    <input type='text'
                                           placeholder='First Name'
                                           className='form-control'
                                           id='first_name'
                                           value={this.state.first_name}
                                           onChange={this.handleFirstNameChange}
                                           required/>
                                </div>

                                {/*Last Name*/}
                                <div className='last_name'>
                                    <label htmlFor="last_name">Last Name</label>
                                    <input type='text'
                                           placeholder='Last Name'
                                           className='form-control'
                                           id='last_name'
                                           value={this.state.last_name}
                                           onChange={this.handleLastNameChange}
                                           required/>
                                </div>

                                {/*Residency Location*/}
                                <div className='residency_location'>
                                    <label htmlFor="residency_location">Residency
                                        Location</label>
                                    <input type='text'
                                           placeholder='Residency Location'
                                           className='form-control'
                                           id='residency_location'
                                           value={this.state.residency_location}
                                           onChange={this.handleResidencyLocationChange}
                                           required/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div className="middle">
                        <h2>Education</h2>
                        <div className="centered">
                            <div className='jumbotron'>

                                {/*Major*/}
                                <div className='major'>
                                    <label htmlFor="major">Major</label>
                                    <input type='text'
                                           placeholder='major'
                                           className='form-control'
                                           id='major'
                                           value={this.state.major}
                                           onChange={this.handleMajorChange}
                                           required/>
                                </div>

                                {/*Institute*/}
                                <div className='institute'>
                                    <label htmlFor="institute">Institute</label>
                                    <input type='text'
                                           placeholder='Institute'
                                           className='form-control'
                                           id='institute'
                                           value={this.state.institute}
                                           onChange={this.handleInstituteChange}
                                           required/>
                                </div>

                                {/*Education Start Date*/}
                                <div className='education_start_date'>
                                    <label htmlFor="education_start_date">Start
                                        Date</label>
                                    <input type='date'
                                           placeholder='Start Date'
                                           className='form-control'
                                           id='education_start_date'
                                           value={this.state.education_start_date}
                                           onChange={this.handleEducationStartDateChange}
                                           required/>
                                </div>

                                {/*Education End Date*/}
                                <div className='education_end_date'>
                                    <label htmlFor="education_end_date">End
                                        Date</label>
                                    <input type='date'
                                           placeholder='End Date'
                                           className='form-control'
                                           id='education_end_date'
                                           value={this.state.education_end_date}
                                           onChange={this.handleEducationEndDateChange}
                                           required/>
                                </div>

                                {/*GPA*/}
                                <div className='gpa'>
                                    <label htmlFor="gpa">GPA</label>
                                    <input type='number'
                                           placeholder='GPA'
                                           className='form-control'
                                           id='gpa'
                                           value={this.state.gpa}
                                           onChange={this.handleGPAChange}
                                           required/>
                                </div>

                                {/*Certificate Name*/}
                                <div className='certificate_name'>
                                    <label htmlFor="certificate_name">Certificate
                                        Name</label>
                                    <input type='text'
                                           placeholder='Certificate Name'
                                           className='form-control'
                                           id='certificate_name'
                                           value={this.state.certificate_name}
                                           onChange={this.handleCertificateNameChange}
                                           required/>
                                </div>

                                {/*Education Description*/}
                                <div className='education_description'>
                                    <label
                                        htmlFor="education_description">Description</label>
                                    <input type='text'
                                           placeholder='Education Description'
                                           className='form-control'
                                           id='education_description'
                                           value={this.state.education_description}
                                           onChange={this.handleEducationDescriptionChange}
                                           required/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div className="right">
                        <h2>Experience</h2>
                        <div className="centered">
                            <div className='jumbotron'>

                                {/*is Current Job*/}
                                <div className='is_current_job'>
                                    <label htmlFor="is_current_job">Current
                                        Job</label>
                                    <RadioGroup
                                        onChange={this.handleIsCurrentJobChange}
                                        horizontal
                                        selectedvalue={"1"}>
                                        <RadioButton value="1">
                                            Yes
                                        </RadioButton>
                                        <RadioButton value="0">
                                            No
                                        </RadioButton>
                                    </RadioGroup>
                                </div>

                                {/*Experience Start Date*/}
                                <div className='experience_start_date'>
                                    <label htmlFor="experience_start_date">Start
                                        Date</label>
                                    <input type='date'
                                           placeholder='Start Date'
                                           className='form-control'
                                           id='experience_start_date'
                                           value={this.state.experience_start_date}
                                           onChange={this.handleExperienceStartDateChange}
                                           required/>
                                </div>

                                {/*Experience End Date*/}
                                <div className='experience_end_date'>
                                    <label htmlFor="experience_end_date">End
                                        Date</label>
                                    <input type='date'
                                           placeholder='End Date'
                                           className='form-control'
                                           id='experience_end_date'
                                           value={this.state.experience_end_date}
                                           onChange={this.handleExperienceEndDateChange}
                                           required/>
                                </div>

                                {/*Title*/}
                                <div className='title'>
                                    <label htmlFor="title">Title</label>
                                    <input type='text'
                                           placeholder='Title'
                                           className='form-control'
                                           id='title'
                                           value={this.state.title}
                                           onChange={this.handleTitleChange}
                                           required/>
                                </div>

                                {/*Company Name*/}
                                <div className='company_name'>
                                    <label htmlFor="company_name">Company
                                        Name</label>
                                    <input type='text'
                                           placeholder='Company Name'
                                           className='form-control'
                                           id='company_name'
                                           value={this.state.company_name}
                                           onChange={this.handleCompanyNameChange}
                                           required/>
                                </div>

                                {/*Company Location*/}
                                <div className='company_lcoation'>
                                    <label htmlFor="company_lcoation">Company
                                        Location</label>
                                    <input type='text'
                                           placeholder='Company Location'
                                           className='form-control'
                                           id='company_lcoation'
                                           value={this.state.company_location}
                                           onChange={this.handleCompanyLocationChange}
                                           required/>
                                </div>

                                {/*Description*/}
                                <div className='description'>
                                    <label
                                        htmlFor="description">Description</label>
                                    <input type='text'
                                           placeholder='Description'
                                           className='form-control'
                                           id='description'
                                           value={this.state.description}
                                           onChange={this.handleDescriptionChange}
                                           required/>
                                </div>

                                {/*Skills*/}
                                <div className='skills'>
                                    <label htmlFor="skills">Skills</label>
                                    <input type='text'
                                           placeholder='Skills'
                                           className='form-control'
                                           id='skills'
                                           value={this.state.skills}
                                           onChange={this.handleSkillsChange}
                                           required/>
                                </div>

                                {/*Skill Level*/}
                                <div className='skill_level'>
                                    <label htmlFor="skill_level">Skill
                                        Level</label>
                                    <input type='text'
                                           placeholder='Skill Level'
                                           className='form-control'
                                           id='skill_level'
                                           value={this.state.skill_level}
                                           onChange={this.handleSkillLevelChange}
                                           required/>
                                </div>

                                {/*LinkedIn*/}
                                <div className='linkedIn'>
                                    <div><i
                                        className="fa fa-linkedin socialMediaIcon"/>
                                    </div>
                                    <input type='text'
                                           placeholder='LinkedIn'
                                           className='form-control'
                                           id='linkedIn'
                                           value={this.state.linkedin}
                                           onChange={this.handleLinkedinChange}
                                           required/>
                                </div>

                                {/*GitHub*/}
                                <div className='GitHub'>
                                    <div><i
                                        className="fa fa-github socialMediaIcon"/>
                                    </div>
                                    <input type='text'
                                           placeholder='GitHub'
                                           className='form-control'
                                           id='GitHub'
                                           value={this.state.github}
                                           onChange={this.handleGithubChange}
                                           required/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" value="Submit">Submit</button>
                </form>
            </div>
        );
    }
}