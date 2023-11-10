import React from 'react';
import { StyleSheet, View, Text, ImageBackground } from 'react-native';
import { Card } from '@rneui/themed';
import Menu from './Menu';
import Icon from 'react-native-vector-icons/FontAwesome';

const image = {uri: 'https://i.pinimg.com/564x/db/5e/5f/db5e5f1b1e36e2ba791d96d56c9b8669.jpg'};


const Home = ({ navigation }) => {
    const navigateToScreen = (screenName) => {
        navigation.navigate(screenName);
    };

    return (
            <View style={styles.cardContainer}>
                <ImageBackground source={image} resizeMode="cover" style={styles.image}>
                <Card style={styles.card}>
                    <Card.Title style={{ fontSize: 20 }}>Bienvenido a Willy's Pizza</Card.Title>
                    <Text style={{ fontSize: 20, textAlign: 'center' }}>
                        Podrás:
                        {"\n"}
                        <Text><Icon name="th-list" size={20} color="#FAEE00" /> Ver ordenes.</Text>
                        {"\n"}
                        <Text><Icon name="shopping-cart" size={20} color="#FAEE00" /> Realizar orden.</Text>
                        {"\n"}
                        
                    </Text>
                    <View style={styles.buttonContainer}>
                    </View>
                </Card>
                <Menu navigation={navigation} />
                </ImageBackground>
            </View>
    );
};

const styles = StyleSheet.create({
    container: {
        flex: 1,
        backgroundColor: '#D3B87D',
    },
    cardContainer: {
        flex: 1,
        // justifyContent: 'center',
        // alignItems: 'center',
    },
    card: {
        width: 300,
        height: 300,
        backgroundColor: 'blue',
    },
    imageContainer: {
        justifyContent: 'center',
        alignItems: 'center',
    },
    buttonContainer: {
        marginTop: 20,
    },
    button: {
        backgroundColor: '#007AFF',
        padding: 10,
        margin: 10,
        borderRadius: 5,
    },
    buttonText: {
        color: 'white',
        textAlign: 'center',
    },
    image: {
        flex: 1,
        justifyContent: 'center',
        alignItems: 'center',
      },
});

export default Home;