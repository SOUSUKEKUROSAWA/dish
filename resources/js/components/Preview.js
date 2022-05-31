import React, { useState } from "react";
import ReactDOM from 'react-dom';

const Preview = (props) => {
    const [showPreview, setShowPreview] = useState(false);
    
    return (
        <>
            {showPreview ? (
                <>
                    <iframe is="x-frame-bypass" src={props.url}></iframe>
                    // <iframe src="https://www.itpassportsiken.com/ipkakomon.php"></iframe>
                    <h2 className='comment'>{props.comment}</h2>
                    <div>作成日時：{props.createdAt}</div>
                    <h2 className='redirect'>
                        <a href={props.url}>今日，これ食べよ</a>
                    </h2>
                    <button onClick={()=>setShowPreview(false)}>閉じる</button>
                </>
            ) : (
                <>
                    <button onClick={()=>setShowPreview(true)}>サイトをプレビュー</button>
                    <h2 className='comment'>{props.comment}</h2>
                    <div>作成日時：{props.createdAt}</div>
                </>
            )}
        </>
    );
};

export default Preview;
