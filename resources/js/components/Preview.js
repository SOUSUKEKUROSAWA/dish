import React, { useState } from "react";
import ReactDOM from 'react-dom';
import Iframe from 'react-iframe';

const Preview = (props) => {
    const [showPreview, setShowPreview] = useState(false);
    
    return (
        <>
            {showPreview ? (
                <>
                    <div className="box-shadow box-shadow-searchpost preview-frame">
                        <div className="side-by-side">
                            <a className="btn btn-primary" href={props.url} target="_blank">サイトへGO！</a>
                            <button className="btn btn-secondary" onClick={()=>setShowPreview(false)}>閉じる</button>
                        </div>
                        <div className="justify-content">
                            <img className='preview-image' src={props.img_path}/>
                            {/*<Iframe srcdoc={props.url} is="x-frame-bypass" url={props.url} title={props.comment} sandbox="allow-scripts allow-same-origin allow-orientation-lock allow-pointer-lock allow-presentation allow-popups-to-escape-sandbox allow-top-navigation" allowfullscreen/>
                            <iframe srcdoc={props.url} is="x-frame-bypass" src={props.url} title={props.comment} sandbox="allow-scripts allow-same-origin allow-orientation-lock allow-pointer-lock allow-presentation allow-popups-to-escape-sandbox allow-top-navigation" allowfullscreen></iframe>*/}
                        </div>
                        <div className="justify-content">
                            <p className='explain'>紹介してくれた人からのコメント</p>
                        </div>
                        <div className="justify-content">
                            <p>{props.comment}</p>
                        </div>
                        <small className='created-at'>作成日時：{props.createdAt}<br/></small>
                        <small className='created-at'>更新日時：{props.updatedAt}</small>
                    </div>
                </>
            ) : (
                <>
                    <div className="box-shadow box-shadow-searchpost preview-frame">
                        <div className="justify-content">
                            <button className="btn btn-primary" onClick={()=>setShowPreview(true)}>詳しくみる</button>
                        </div>
                        <div className="justify-content">
                            <p className='explain'><br/>紹介してくれた人からのコメント</p>
                        </div>
                        <div className="justify-content">
                            <p>{props.comment}</p>
                        </div>
                        <small className='created-at'>作成日時：{props.createdAt}<br/></small>
                        <small className='created-at'>更新日時：{props.updatedAt}</small>
                    </div>
                </>
            )}
        </>
    );
};

export default Preview;
