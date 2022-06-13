import React, { useState } from "react";
import ReactDOM from 'react-dom';

const Preview = (props) => {
    const [showPreview, setShowPreview] = useState(false);
    
    return (
        <>
            {showPreview ? (
                <>
                    <div className="box-shadow box-shadow-searchpost preview-frame">
                        <iframe src={props.url}></iframe>
                        <iframe is="x-frame-bypass" src={props.url}></iframe>
                        <iframe src="https://www.itpassportsiken.com/ipkakomon.php"></iframe>
                        <p className='comment'>「紹介してくれた人からのコメント・・・」<br/>{props.comment}</p>
                        <p className='created-at'>作成日時：{props.createdAt}</p>
                        <div className="side-by-side">
                            <a className="box-shadow box-shadow-searchpost" href={props.url}>今日，これ食べよ</a>
                            <button className="box-shadow box-shadow-searchpost" onClick={()=>setShowPreview(false)}>閉じる</button>
                        </div>
                    </div>
                </>
            ) : (
                <>
                    <div className="box-shadow box-shadow-searchpost preview-frame">
                        <button className="box-shadow box-shadow-searchpost" onClick={()=>setShowPreview(true)}>サイトをプレビュー</button>
                        <p className='comment'>「紹介してくれた人からのコメント・・・」<br/>{props.comment}</p>
                        <p className='created-at'>作成日時：{props.createdAt}</p>
                    </div>
                </>
            )}
        </>
    );
};

export default Preview;
