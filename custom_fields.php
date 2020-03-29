<?

function run(){
 $thumbnail_field = [
                //      'type'        => \WPGraphQL\Types::list_of( \WPGraphQL\Types::string() ),
                        'type'        => 'String',
                        'description' => __( 'Custom field for user mutations', 'your-textdomain' ),
                        'resolve'     => function( $cat ) {
                                $thumbId = get_term_meta($cat->categoryId, 'category-image-id', true );
                                $thumb_src = wp_get_attachment_url($thumbId);
                                return ! empty( $thumb_src ) ? $thumb_src : null ;
                        },
                ];

                register_graphql_field( 'Category', 'thumbnail', $thumbnail_field );


}
