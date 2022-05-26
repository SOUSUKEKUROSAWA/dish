import React from 'react';
import ReactDOM from 'react-dom';

const Preview = (props) => {
    const closePreview = () => {
      props.setShowPreview(false);
    };
    
    return (
        <>
            {props.open ? (
                <>
                    <iframe src={props.url}></iframe>
                    <button onClick={closePreview}>閉じる</button>
                </>
            ) : (
                <></>
            )}
        </>
    );
};

export default Preview;
