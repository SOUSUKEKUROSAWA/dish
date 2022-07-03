import React from 'react';
import ReactDOM from 'react-dom';
import Preview from "./Preview";

const OpenPreview = () => {
    {/*--- postsインスタンスの読み込みとエラー時の処理 ---*/}
    const targetDom=document.getElementById("openpreview");
    const str_posts=targetDom?.dataset.posts; {/*data-postsが存在する場合はそれを取得，存在しない場合は"undefined"を返す*/}
    const posts=JSON.parse(str_posts ?? ""); {/*str-postsが存在する場合はそれをオブジェクト型に変換，存在しない場合は""を返す*/}
    
    return (
        <>
            <div className="posts">
                {posts.map((post)=>{
                    return(
                        <>
                            {/*--- Previewコンポーネントの呼び出し＆propsの受け渡し ---*/}
                            <Preview url={post['url']} img_path={post['img_path']} comment={post['comment']} createdAt={post['created_at']} updatedAt={post['updated_at']} />
                        </>
                    )
                })}
            </div>
        </>
    );
};

export default OpenPreview;

if (document.getElementById('openpreview')) {
    ReactDOM.render(<OpenPreview />, document.getElementById('openpreview'));
}
